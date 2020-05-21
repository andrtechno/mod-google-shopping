<?php

namespace panix\mod\google\shopping\components;

use TheIconic\Tracking\GoogleAnalytics\Analytics;
use yii\base\BaseObject;
use Yii;

/**
 * Class MeasurementProtocol
 * @package panix\mod\google\shopping\components
 */
class MeasurementProtocol extends BaseObject
{
    /** @var string Tracking ID (UA-XXXX-Y) */
    public $tracking_id;

    /** @var string Protocol version */
    public $version = '1';

    /** @var bool Use HTTPS instead of plain HTTP */
    public $use_ssl = false;

    /** @var bool Override the IP address by the user’s */
    public $override_ip = true;

    /** @var bool Anonymize the IP address of the sender */
    public $anonymize_ip = false;

    /** @var bool Use asynchronous requests (not waiting for a response) */
    public $async_mode = false;

    /** @var bool Try to set ClientId automatically from `_ga` cookie */
    public $autoset_client_id = false;

    /**
     * @return Analytics
     */
    public function request()
    {
        $request = new Analytics($this->use_ssl);
        $request->setTrackingId($this->tracking_id)
            ->setProtocolVersion($this->version)
            ->setAsyncRequest($this->async_mode);

        if ($this->override_ip && isset(Yii::$app->request->userIP)) {
            $request->setIpOverride(Yii::$app->request->userIP);
        }

        if ($this->anonymize_ip) {
            $request->setAnonymizeIp(1);
        }

        if ($this->autoset_client_id) {
            $clientId = $this->extractClientIdCookie();
            if (!empty($clientId)) {
                $request->setClientId($clientId);
            }
        }

        return $request;
    }

    /**
     * @return string
     */
    protected function extractClientIdCookie()
    {
        $cookie = Yii::$app->request->cookies->getValue('_ga', '');
        $cookieParts = explode('.', $cookie);
        $clientIdParts =  array_slice($cookieParts, -2);
        return implode('.', $clientIdParts);
    }
}
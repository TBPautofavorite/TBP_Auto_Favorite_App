<?php
/**
 * twitter class
 */
class Twitter {
    /**
    * The Application ID (Consumer Key).
    * @var string
    */
    protected $appId;
    
    /**
    * The Application App Secret (Consumer Secret).
    * @var string
    */
    protected $appSecret;
    
    /**
    * The ID of the twitter user, or 0 if the user is logged out.
    * @var string
    */
    protected $user;
    
    public function __construct($config) {
        $this->appId = $config['appId'];
        $this->appSecret = $config['secret'];
        // Yii::app()->params['consumerKey'];
        // Yii::app()->params['consumerSecret'];
    }
    
    /**
     * Get the UID of the connected user, or 0
     * if the twitter user is not connected.
     *
     * @return string the UID if available.
     */
    public function getUser() {
        if ($this->user !== null) {
            // we've already determined this and cached the value.
            return $this->user;
        }

        ///////////////////
        // extract data from cookie stored in json
        $cookie_name = "twitter_oauth_{$this->appId}";
//         $data = "%7B%22signature_version%22%3A%221%22%2C%22signature_method%22%3A%22HMAC-SHA1%22%2C%22signature_order%22%3A%5B%22access_token%22%2C%22member_id%22%5D%2C%22access_token%22%3A%22m3xjuS1sr4pBMYzqVI3tei5E17rEbdQCMNlq%22%2C%22signature%22%3A%2253DHkNOhacej7tS1ejC%5C%2Fkx%2Bhb1U%3D%22%2C%22member_id%22%3A%22BIXbTTKAy9%22%7D";
//         $credentials_json = rawurldecode( $data );
        //hmmmm... use rawurldecode not urldecode, otherwise '+' will decode to ' '
        $credentials_json = rawurldecode( $_COOKIE[$cookie_name] ); 
        $credentials = json_decode($credentials_json);
        
        // validate signature
        if ($credentials->signature_version == 1) {
            if ($credentials->signature_order && is_array($credentials->signature_order)) {
                $base_string = '';
                // build base string from values ordered by signature_order
                foreach ($credentials->signature_order as $key) {
                    if (isset($credentials->$key)) {
                        $base_string .= $credentials->$key;
                    } else {
                        return 0;
                    }
                }
                // hex encode an HMAC-SHA1 string
                $signature =  base64_encode(hash_hmac('sha1', $base_string, $this->appSecret, true));
                // check if our signature matches the cookie's
                if ($signature == $credentials->signature) {
                    $this->user = $credentials->member_id;
                    return $this->user;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } 
        return 0;
    }
}
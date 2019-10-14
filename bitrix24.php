class Bitrix24
{
    const CRM_URL = 'https://******/';

    public function createLead(array $arLeadData)
    {
        $queryUrl = self::CRM_URL."crm.lead.add.json";

        $queryData = http_build_query(array(
            'fields' => array(
                "TITLE" => "Заявка с сайта ******",
                "NAME" => $arLeadData['name'],
                "STATUS_ID" => "NEW",
                "OPENED" => "Y",
                "SOURCE_ID"=> 1,
                "PHONE" => array(array("VALUE" =>  $arLeadData['phone'], "VALUE_TYPE" => "WORK" )),
            ),
            'params' => array("REGISTER_SONET_EVENT" => "Y")
        ));

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        
        $result = curl_exec($curl);
        curl_close($curl);

        if (array_key_exists('error', $result)) {
            return false;
        }
        else {
            return true;
        }
    }
}

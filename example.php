$queryUrl = 'https://prural.bitrix24.ru/rest/152/###/crm.lead.add.json';
					$queryData = http_build_query(array(
					'fields' => array(
					"TITLE" => $leadData['PHONE_WORK']." Заявка с  сайта promo74",
					"NAME" => $leadData['NAME'],
					"STATUS_ID" => "NEW",
					"OPENED" => "Y",
					"ASSIGNED_BY_ID" => 184,
					"ORIGINATOR_ID"=>"538",
					"SOURCE_DESCRIPTION"=> "Сайт",
					"SOURCE_ID"=>"SOURCE NAME",
					"PHONE" => array(array("VALUE" =>  $leadData['PHONE_WORK'], "VALUE_TYPE" => "WORK" )),
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

					$result = json_decode($result, 1);

					if (array_key_exists('error', $result)) echo ("Ошибка при сохранении лида:");

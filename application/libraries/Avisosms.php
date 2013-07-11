
<?php if (!defined('BASEPATH')) exit('��� ������� � �������'); 

class Avisosms
	{		
		/** $url - ���-����� �������, � �������� �� ���������� */
		var $url = 'http://api.avisosms.ru/sms/json/';
		/** $username - ����� */
		var $username;
		/** $password - ������ */
		var $password;
		
		/** ����������� ������ */
		function avisosms($params)
		{
			$this->username = $params['username'];
			$this->password = $params['password'];
		}
		/**
		*   ������� GetPageByUrl($headers, $post_body) �������� http-������ ������� get � ������� $post_body � �������� ���� ������� � ����� �������� �� ����
		*
		*   @param     $post_body - get ������;
		*
		*/
		function get_page_by_url($headers, $post_body)
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this -> url); // ��� ��������
			curl_setopt($ch, CURLOPT_FAILONERROR, 1); //  ��������� ��� ������ > 300
			curl_setopt($ch, CURLOPT_COOKIE, 1); // ����� ����
			curl_setopt($ch, CURLOPT_VERBOSE, 1); // ���������� ��������� ����
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // ��������� ��������� �� ������� $headers
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // ������� ��������� ������� � ����������
			
			/** �������� ������ ������� POST */

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body); // ������� post-������
			
			$result = curl_exec($ch); // �������� ��������� � ����������
			curl_close($ch);
			return $result;
		}	
		
		/** ������� GetCreditBalance() ����������� ������ ������������
		*
		*   @return array - ������� ���������� ������ ������� ������� status � balance
		*
		*/
		function get_credit_balance()
		{
			$http_body = array(
				"username" => $this->username,
				"password" => $this->password,
				"request_type" => 'get_balance'
			);

			$http_body = json_encode($http_body);
			$headers[] = 'Content-Type: text/xml; charset=utf-8';
			$headers[] = 'Content-Length: ' . strlen($http_body);
			$server_answer = $this->get_page_by_url($headers, $http_body);
			$server_answer = (array)json_decode($server_answer);
			return $server_answer;
		}
		
		/** ������� SendTextMessage() ��� ������ �� �������� sms, ���������� ����� ������� � id ���� ������������ �����, ���� ��������� ���� ������� � ��������� �� ��������� �����
		*
		*   @param $destination_address string ��������� ���������� ����� ���������� ���������, � ������������� �������: ��� ������ + ��� ���� + ����� ��������. ������: 7903123456
		*   @param $message string ����� ���������, �������������� ��������� IA5 � UCS2
		*   @param $source_address string ����� ����������� ���������. �� 11 ��������� �������� ��� �� 15 ��������
		*   @param $flash boolean �������� Flash-SMS
		*
		*   @return array - ������� ���������� ������ ������� ������� status � messageID
		*/	
		function send_text_message($destination_address, $message, $source_address, $flash = false)
		{
			$flash = intval($flash);
			$message = iconv("WINDOWS-1251", "UTF-8", $message);
			$http_body = array(
				'username' => $this->username,
				'password' => $this->password,
				'request_type' => 'send_message',
				'destination_address' => $destination_address,
				'message' => $message,
				'source_address' => $source_address,
				'flash' => $flash	
			);

			$http_body = json_encode($http_body);
			$headers[] = 'Content-Type: text/xml; charset=utf-8';
			$headers[] = 'Content-Length: ' . strlen($http_body);
			$server_answer = $this->get_page_by_url($headers, $http_body);
			$server_answer = (array)json_decode($server_answer);
			return $server_answer;
		}
		
		/**
		* GetMessageState � ������ �� ��������� ������ ������������� SMS-���������
		*
		*    @param $messageId string ������������� ���������
		*
		*    @return array - ������� ���������� ������ ������� ������� status � message_state
		*/
		function get_message_state($messageId)
		{
			$http_body = array(
				'username' => $this->username,
				'password' => $this->password,
				'request_type' => 'get_message_state',
				'messageID' => $messageId
			);

			$http_body = json_encode($http_body);
			$headers[] = 'Content-Type: text/xml; charset=utf-8';
			$headers[] = 'Content-Length: ' . strlen($http_body);
			$server_answer = $this->get_page_by_url($headers, $http_body);
			$server_answer = (array)json_decode($server_answer);
			return $server_answer;
		}
	}

?>
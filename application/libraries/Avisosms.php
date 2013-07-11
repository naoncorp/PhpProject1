
<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту'); 

class Avisosms
	{		
		/** $url - урл-адрес сервера, к которому мы обращаемся */
		var $url = 'http://api.avisosms.ru/sms/json/';
		/** $username - логин */
		var $username;
		/** $password - пароль */
		var $password;
		
		/** конструктор класса */
		function avisosms($params)
		{
			$this->username = $params['username'];
			$this->password = $params['password'];
		}
		/**
		*   Функция GetPageByUrl($headers, $post_body) посылает http-запрос методом get и передаёт $post_body в качестве тела запроса и берет страницу по урлу
		*
		*   @param     $post_body - get запрос;
		*
		*/
		function get_page_by_url($headers, $post_body)
		{
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $this -> url); // урл страницы
			curl_setopt($ch, CURLOPT_FAILONERROR, 1); //  завершать при ошибке > 300
			curl_setopt($ch, CURLOPT_COOKIE, 1); // пишем куки
			curl_setopt($ch, CURLOPT_VERBOSE, 1); // показывать подробную инфу
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // отправить заголовки из массива $headers
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // вернуть результат запроса в переменную
			
			/** ОТПРАВКА ДАННЫХ МЕТОДОМ POST */

			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body); // передаём post-данные
			
			$result = curl_exec($ch); // получить результат в переменную
			curl_close($ch);
			return $result;
		}	
		
		/** функция GetCreditBalance() запрашивает баланс пользователя
		*
		*   @return array - функция возвращает массив ответов сервера status и balance
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
		
		/** функция SendTextMessage() шлёт запрос об отправке sms, возвращает ответ сервера и id всех отправленных смсок, если сообщение было длинное и разбилось на несколько смсок
		*
		*   @param $destination_address string Мобильный телефонный номер получателя сообщения, в международном формате: код страны + код сети + номер телефона. Пример: 7903123456
		*   @param $message string Текст сообщения, поддерживаемые кодировки IA5 и UCS2
		*   @param $source_address string Адрес отправителя сообщения. До 11 латинских символов или до 15 цифровых
		*   @param $flash boolean Отправка Flash-SMS
		*
		*   @return array - функция возвращает массив ответов сервера status и messageID
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
		* GetMessageState – запрос на получение статус отправленного SMS-сообщения
		*
		*    @param $messageId string Идентификатор сообщения
		*
		*    @return array - функция возвращает массив ответов сервера status и message_state
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
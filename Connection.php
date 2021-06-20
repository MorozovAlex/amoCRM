<?php

namespace App;

use Exception;

class Connection
{
    private const ACCESS_TOKEN = '####';

    private const SUBDOMAIN = '####';

    public function post($data, $path)
    {
        $curl = curl_init(); //Сохраняем дескриптор сеанса cURL
        /** Устанавливаем необходимые опции для сеанса cURL  */
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $this->getLink($path));
        curl_setopt($curl,CURLOPT_HTTPHEADER, $this->getHeaders());
        curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
        $out = curl_exec($curl); //Инициируем запрос к API и сохраняем ответ в переменную
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $code = (int)$code;
        $errors = [
            400 => 'Bad request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not found',
            500 => 'Internal server error',
            502 => 'Bad gateway',
            503 => 'Service unavailable',
        ];

        try {
            /** Если код ответа не успешный - возвращаем сообщение об ошибке  */
            if ($code < 200 || $code > 204) {
                throw new Exception($errors[$code] ?? 'Undefined error', $code);
            }

            return $out;
        } catch(\Exception $e) {
            die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
        }

    }

    private function getLink(string $path): string
    {
        return 'https://' . self::SUBDOMAIN . '.amocrm.ru/api' . $path;
    }

    private function getHeaders(): array
    {
        return ['Authorization: Bearer ' . self::ACCESS_TOKEN];
    }
}

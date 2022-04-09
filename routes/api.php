<?php
use App\Helpers\Telegram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/tg', function () {
      $telegram = new Telegram();
      $telegram->sendMessage(761657672, '<b>sdfsdfds</b>');


      return [
          'type' => 'telegram',
          'action' => 'sendMessage',
        ];
    });
    Route::post('/vk', function() {
        if (!isset($_REQUEST)) {
            return;
        }
        //Строка для подтверждения адреса сервера из настроек Callback API
        $confirmation_token = '84632586';
        //Ключ доступа сообщества
        $token = '12bc381c15459f8140d0ba0154e92037dd4249d229cb2ffc786c66e10a27ffafe0461f788d9c23411fa71';
        //Получаем и декодируем уведомление
        $data = json_decode(file_get_contents('php://input'));
        //Проверяем что находится в поле "type"
        switch ($data->type) {
            //Если это уведомление для подтверждения адреса...
            case 'confirmation':
                //...отправляем строку для подтверждения
                echo $confirmation_token;
                break;
            //Если это уведомление о новом сообщении...
            case 'message_new':
                //...получаем id его автора
                $user_id = $data->object->message->from_id;
                //затем с помощью users.get получаем данные об авторе
                $user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&access_token={$token}&v=5.103"));
                //и извлекаем из ответа его имя
                $user_name = $user_info->response[0]->first_name;
                //С помощью messages.send отправляем ответное сообщение
                $request_params = array(
                    'message' => "Hello, {$user_name}",
                    'random_id' => rand(1, 999999),
                    'peer_id' => $user_id,
                    'access_token' => $token,
                    'v' => '5.131',
                );
                $get_params = http_build_query($request_params);
                file_get_contents("https://api.vk.com/method/messages.send?". $get_params);
                //Возвращаем "ok" серверу Callback API
                echo('ok');
                break;
        }
    });
});

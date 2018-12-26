include_once('Uploader.php');

function ueditor_upload(){
    date_default_timezone_set("Asia/chongqing");
    error_reporting(E_ERROR);
    header("Content-Type: text/html; charset=utf-8");

    $CONFIG = config('UEDITOR_CONFIG');
    $action = $_GET['action'];

    switch ($action) {
        case 'config':
            $result =  json_encode($CONFIG);
            break;

        /* 上传图片 */
        case 'uploadimage':
            /* 上传涂鸦 */
        case 'uploadscrawl':
            /* 上传视频 */
        case 'uploadvideo':
            /* 上传文件 */
        case 'uploadfile':
            $result = \Ueditor\Uploader::action_upload($CONFIG);
            break;

        /* 列出图片 */
        case 'listimage':
            $result = \Ueditor\Uploader::action_list($CONFIG);
            break;
        /* 列出文件 */
        case 'listfile':
            $result = \Ueditor\Uploader::action_list($CONFIG);
            break;

        /* 抓取远程文件 */
        case 'catchimage':
            $result = \Ueditor\Uploader::action_crawler($CONFIG);
            break;

        default:
            $result = json_encode(array(
                'state'=> '请求地址出错'
            ));
            break;
    }

    /* 输出结果 */
    if (isset($_GET["callback"])) {
        if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
            echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
        } else {
            echo json_encode(array(
                'state'=> 'callback参数不合法'
            ));
        }
    } else {
        echo $result;
    }
}

ueditor_upload();
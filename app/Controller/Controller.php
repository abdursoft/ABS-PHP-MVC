<?php
/** Abs Framework
 *  Developed by abdursoft
 *  Author Abdur Rahim
 *  Version 1.0.1
 *  Born on 2023
 */

 
namespace App\Controller;

use DB\Database;
use System\Auth;
use System\Loader;

class Controller extends Database
{
    public $load;
    public function __construct()
    {
        $this->load = new Loader();
        Auth::init();
    }

    public function init()
    {
        $this->load->page_title = "Home Page";
        $this->metaContent('Abs Framework Developed By ABDURSOFT', 'ABS Framework is a PHP mvc framework that was built by abdursoft and the Author is Abdur Rahim');
        $this->load->view('welcome');
    }

    //page redirect 
    public function redirect($path)
    {
        header("Location: " . $path);
    }

    public function redirectTimer($path, $second)
    {
?>
        <script>
            let r = 0;
            const timer = setInterval(() => {
                r++;
                if (r == <?= $second ?>) {
                    clearInterval(timer);
                    document.location.href = '<?= $path ?>';
                }
            }, 1000);
        </script>
        <?php
    }

    public function redirectBack(){
        ?>
            <script>
                history.back();
            </script>
        <?php
    }

    public function response(array $data)
    {
        echo json_encode($data);
    }

    public function jsonResponse(array $data)
    {
        header('Content-type:application/json');
        echo json_encode($data);
    }

    // Password validation 
    public function passwordValideate($password)
    {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return 'weak';
        } else {
            return 'ok';
        }
    }

    // remove special character    
    function removeSpecial($txt = null)
    {
        $str = $txt;
        $arr = array('@', '!', '#', '$', '%', '^', '&', '*', '(', ')', '[', ']', '{', '}', '-', '_', '=', '+', '/', '~');
        for ($i = 0; $i < count($arr); $i++) {
            $str = str_replace($arr[$i], ' ', $str);
        }
        return $str;
    }

    // password injectChecker 
    public function injectionChecker($pass)
    {
        $rmNull = str_replace(' ', '#$#', $pass);
        $rmEqual = str_replace('=', '#=#', $rmNull);
        $rmSlash = str_replace('/', '#x#', $rmEqual);
        return $rmSlash;
    }

    // Random character generator 
    public function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - ($length - 1))];
        }
        return $randomString;
    }

    // Get file extension 
    public function getExtension($file)
    {
        $ext = explode('.', $file);
        return strtolower(end($ext));
    }

    // Browser Checking 
    public function Browser()
    {
        $browser_id = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($browser_id, "Mozilla")) {
            return "Mozilla";
        }

        if (strpos($browser_id, "Firefox")) {
            return "Firefox";
        }

        if (strpos($browser_id, "Chrome")) {
            return "Chrome";
        }

        if (strpos($browser_id, "Safari")) {
            return "Safari";
        }

        if (strpos($browser_id, "Edge")) {
            return "Edge";
        }
    }
    // Os Checking 
    public function Os()
    {
        $browser_id = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($browser_id, "Windows")) {
            return "Windows";
        }

        if (strpos($browser_id, "Linux")) {
            return "Linux";
        }

        if (strpos($browser_id, "Macintosh")) {
            return "Macintosh";
        }

        if (strpos($browser_id, "iPhone")) {
            return "iPhone";
        }

        if (strpos($browser_id, "Android")) {
            return "Android";
        }
    }

    // date compare 
    public function dateCompare($date)
    {
        $date1 = date_create(date("Y-m-d H:i:s"));
        $date2 = date_create($date);
        $diff = date_diff($date1, $date2);
        $diff1 = date_diff($date2, $date1);

        if ($diff->y >= 1) {
            return $diff->y . " years ago";
        } elseif ($diff->m >= 1 && $diff->m <= 12) {
            return $diff->m . " months ago";
        } elseif ($diff->d >= 1) {
            return $diff->d . " days ago";
        } elseif ($diff->h >= 1 && $diff->h <= 24) {
            return $diff->h . " hours ago";
        } elseif ($diff->i >= 1 && $diff->i <= 59) {
            return $diff->i . " minutes ago";
        } elseif ($diff->s >= 0 && $diff->s <= 59) {
            return $diff->s . " seconds ago";
        }
    }

    public function dateObject($date)
    {
        $date1 = date_create(date("Y-m-d H:i:s"));
        $date2 = date_create($date);
        $diff = date_diff($date1, $date2);
        $diff1 = date_diff($date2, $date1);
        $date = array();
        $date['y'] = $diff->y;
        $date['m'] = $diff->m;
        $date['d'] = $diff->d;
        $date['h'] = $diff->h;
        $date['mi'] = $diff->i;
        $date['s'] = $diff->s;
        return (object)$date;
    }

    //Getting Real ip address
    public function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function setSession($key,$response){
        if(isset($_SESSION)){
            session_reset();
        }
        Auth::set($key, $response);
    }


    public function loadScript($script)
    {
        $sr = '';
        if (is_array($script)) {
            for ($f = 0; $f < count($script); $f++) {
                $sr .= "<script src='$script[$f]' type='text/javascript'></script>\n";
            }
        } else {
            $sr .= "<script src='$script' type='text/javascript'></script>";
        }
        $this->load->script = $sr;
    }

    public function loadStyle($style)
    {
        $sr = '';
        if (is_array($style)) {
            for ($f = 0; $f < count($style); $f++) {
                $sr .= "<link rel='stylesheet' href='$style[$f]' /> \n";
            }
        } else {
            $sr .= "<link rel='stylesheet' href='$style' />";
        }
        $this->load->style = $sr;
    }

    public function postCURL($data, $url)
    {
        $input = json_encode($data);
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $input,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-Type: application/json')
        );
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    public function mailFooter()
    {
        $message = '';
        $message .= "<p style='color:darkblue;'>THANKS FOR STAY WITH US</p>";
        $message .= "<p style='margin:0;padding:0;'>Support Team " . MAIL_TEAM . "</p>";
        $message .= "<p style='margin:0;padding:0;'>Contact Email : " . MAIL_SUPPORT . "</p>";
        $message .= "<p style='margin:0;padding:0;'>Contact Phone : " . MAIL_CONTACT . "</p>";
        $message .= "<p style='margin:0;padding:0;'>Device Information : " . $this->Browser() . " " . $this->Os() . " " . $this->getIPAddress() . " </p>";
        $message .= "<p style='margin:0;padding:0;'>" . MAIL_OWNER_ADSRESS . "</p>";
        $message .= "</div>";
        $message .= "</body></html>";
        return $message;
    }

    public function absPopup($title = null, $description = null, $url = null, $is_blank = null)
    {
        ob_start();
        if (isset($url)) {
        ?>
            <script>
                // window.open("<?= $url ?>", 'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=350,height=470');
                if ('<?= $is_blank ?>' == 'yes') {
                    window.open("<?= $url ?>", '_blank');
                } else {
                    document.location.href = '<?= $url ?>';
                }
            </script>
        <?php
        }
        $end = ob_get_clean();
        echo $end;
    }

    //Set flash message
    public function flashMessage($background, $textColor, $barColor, $message)
    {
        ob_start();
    ?>
        <script>
            window.addEventListener('load', async () => {
                let t = 2;
                var body = document.querySelectorAll('body');
                var message = document.createElement('div');
                message.style.cssText = "position:fixed;right:4px;top:10px;background:<?= $background ?>;color:<?= $textColor ?>;padding:5px 8px;border-radius:7px;z-index:999999999999999999999";
                message.textContent = "<?= $message ?>";
                var less = document.createElement('div');
                less.style.cssText = "width:100%;height:3px;background:<?= $barColor ?>;";
                message.append(less);
                document.body.appendChild(message);
                let l = 100;
                const timer = setInterval(() => {
                    t--;
                    l -= 100
                    less.style.width = `${l}%`;
                    less.style.transition = '1s ease all';
                    if (t == 0 || t < 0) {
                        clearInterval(timer);

                        message.style.display = 'none';
                    }
                }, 1000);
            })
        </script>
    <?php
        $this->load->flash = ob_get_clean();
    }

    public function metaContent($title = null, $description = null, $image = null, $keywords = null)
    {
        ob_start();
        $keywords = 'crickbd cricket live score live cricket tv live scoreboard cricket t20 icc live world cup match t20 world cup 2022 score live cricket match live cricket match cricket cricket live cricket icc cricket live today live cricket scores today today cricket match  cricket scores today match live score icc cricket live match cricket live video live cricket icc cricket update live cricket match today score cricket live cricket t20 watch cricket online live cricket news latest cricket news watch cricket watch live cricket cricket online live cricket match live match cricket match cricket cricbuzz espnscricinfo';
    ?>
        <meta name="description" content="<?= $description ?>" />
        <meta property="og:title" content="<?= $title ?>" />
        <meta property="og:description" content="<?= $description ?>" />
        <meta name="keywords" content="<?= $keywords ?>" />
        <meta property="og:url" content="<?= BASE_URL ?>" />
        <meta property="og:site_name" content="<?= $_SERVER['HTTP_HOST'] ?>" />
        <meta property="og:updated_time" content="<?= date('Y-m-d H-i-s') ?>" />
        <meta property="og:image" content="<?= $image ?>" />
        <meta property="og:image:secure_url" content="<?= $image ?>" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="1200" />
        <meta property="og:image:alt" content="custom" />
        <meta property="og:image:type" content="image/png" />
        <meta property="article:published_time" content="<?= date('Y-m-d H-i-s') ?>" />
        <meta property="article:modified_time" content="<?= date('Y-m-d H-i-s') ?>" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="<?= $title ?>" />
        <meta name="twitter:keywords" content="<?= $keywords ?>" />
        <meta name="twitter:description" content="<?= $description ?>" />
        <meta name="twitter:image" content="<?= $image ?>" />
        <meta name="twitter:label1" content="Written by" />
        <meta name="twitter:data1" content="<?= $_SERVER['HTTP_HOST'] ?>" />
        <meta name="twitter:label2" content="Time to read" />
        <meta name="twitter:data2" content="1 minute" />
        <meta name="robots" content="index, follow, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />
        <link rel="shortcut icon" href="<?= FAV_ICON ?>" type="image/x-icon">
<?php
        $this->load->meta = ob_get_clean();
    }
}

?>
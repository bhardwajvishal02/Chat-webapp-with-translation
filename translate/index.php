<html>
    <head>
    <title>Google Cloud Translate</title>
    </head>
    <body>
        <?php
            require_once ('vendor/autoload.php');
            use \Statickidz\GoogleTranslate;

            $source = 'en';
            $target = 'hi';
            $text = 'hey how are you';

            $trans = new GoogleTranslate();
            $result = $trans->translate($source, $target, $text);

            echo '<h2>'.$result.'</h2>';
        ?>
    </body>
</htmL>
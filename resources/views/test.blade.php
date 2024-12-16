<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Page</title>
</head>
<body>
    <h1>Test Page</h1>
    <p>If you can see this, the view system is working.</p>
    
    <div style="margin: 20px; padding: 20px; background: #f0f0f0;">
        <h2>Debug Information:</h2>
        <pre>
PHP Version: <?php echo PHP_VERSION; ?>

WordPress Version: <?php echo get_bloginfo('version'); ?>

Theme Path: <?php echo get_template_directory(); ?>

View Path: <?php echo __FILE__; ?>

Active Theme: <?php echo wp_get_theme()->get('Name'); ?>

Current Template: <?php global $template; echo basename($template); ?>
        </pre>
    </div>
</body>
</html> 
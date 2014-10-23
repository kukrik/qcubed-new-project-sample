<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php _p(QApplication::$EncodingType); ?>" />
                <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
<?php if (isset($strPageTitle)) { ?>
		<title><?php _p($strPageTitle); ?></title>
<?php } ?>
		<style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/styles.css");</style>
                <style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/bootstrap.min.css");</style>
                <style type="text/css">@import url("<?php _p(__VIRTUAL_DIRECTORY__ . __APP_CSS_ASSETS__); ?>/bootstrap-admin.min.css");</style>
	</head>
	<body>
            <div role="navigation" class="navbar navbar-default navbar-static-top">
                <div class="container">
                  <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a href="#" class="navbar-brand">Project name</a>
                  </div>
                  <div class="navbar-collapse collapse">
                      <ul class="nav navbar-nav">
                        <li ><a href="index"><span class="glyphicon glyphicon-home"></span><?php echo QApplication::Translate('Home');?></a></li>
                        <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo QApplication::Translate('Dropdown');?><span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                      </ul>
                    <ul class="nav navbar-nav navbar-right">
                          <li ><a href="about">About</a></li>
                          <li class="dropdown">
                          <a data-toggle="dropdown" class="dropdown-toggle " href="#" ><span class="glyphicon glyphicon-user"></span><?php echo QApplication::Translate('Profile');?><span class="caret"></span></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="profile">Change profile</a></li>
                                <li><a href="#">Another action</a></li>
                                <li class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        <li ><a href="logoff"><?php echo QApplication::Translate('Logoff');?></a></li>
                    </ul>
                     
                  </div><!--/.nav-collapse -->
                </div>
            </div>
            <div class="container" >
		<section id="content">
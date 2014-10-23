## qcubed-new-project-sample

First version released  23.10.2014

=========================

## New basic qcubed project

It's based on Qcubed alpha 3 

**Installation instructions**

1. create web page folder in htdocs , download composer 
and make installation of qcubed alpha 3 

- configure composer.json with these lines:

  > 
  {
          "repositories": [
          {
          "type": "vcs",
          "url": "https://github.com/qcubed/framework"
          }
          ],
          "require": {
          "php": "=5.3.0",
          "qcubed/framework": "dev-alpha-3.0"
           },
          "minimum-stability": "dev"
}

- php composer.phar install


2. Download qcubed-new-project-sample  an unzip to web page root folder
with this structure:
> - Web_page_folder
      -  qcubed-new-project-sample
          - app
          - public
          - installation
      -  vendor
            - qcubed ..
            - ....
            
3. **Open browser to point to  page like**

http://localhost/Web_page/public/index.php/






## To do:
installation file for 
creating db , set project title , 
authentication module , editing some configuration.php variables ,
better mod_rewrite and security settings .
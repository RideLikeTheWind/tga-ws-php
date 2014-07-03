tga-ws-php
==========

TGA WebServices in PHP

This very basic repository provides a simple framework for accessing TGA WebServices. To access the services, you will need to contact the TGA Helpdesk for a username and password (tgahelp at innovation dot gov dot au). They provide only .NET and Java examples in their SDK, so this should get you started.

-- How to use this repository

1. Download all files and unpack. If you move them around, make sure in the ws-access.php file, you update the require() lines at the top.
2. Update your Username and Password. 
3. Check that the correct WSDL and Endpoints are used - the ones provided are the most recent of the Training Component Service. There are other options.
4. Make sure you update the $options array for the first SOAP call, depending on the options for the call based on the DataModel in the SDK outline document, provided by TGA.
5. Run! 

You should get the hang of it. Leave a comment if you see any glaring issues or would like some assistance. 

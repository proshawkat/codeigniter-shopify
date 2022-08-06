<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fogzee</title>
    <link rel="stylesheet" href="https://unpkg.com/@shopify/polaris@5.0/dist/styles.css" />
    <style>
        .mt-5{
            margin-top: 5rem;
        }
        .mb-5{
            margin-bottom: 5rem;
        }
        .mb-3{
            margin-bottom: 3rem;
        }
        .mt-3{
            margin-top: 3rem;
        }
        hr{
            height: 1px;
            background-color: #ccc;
            border: none;
        }
        .Polaris-Page{
            max-width: 119.8rem;
        }
    </style>
</head>
<body>
<div>
    <div class="Polaris-Page">
        <div class="Polaris-Page__Content">
            <div class="mt-5 mb-5">
                <div class="Polaris-Page-Header Polaris-Page-Header--hasNavigation Polaris-Page-Header--hasActionMenu Polaris-Page-Header--mobileView Polaris-Page-Header--mediumTitle">
                    <div class="Polaris-Page-Header__Row">
                        <div class="Polaris-Page-Header__LeftAlign">
                            <div>
                                <p class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Welcome to Fogzee App</p>
                                <p class="Polaris-DisplayText Polaris-DisplayText--sizeSmall">Lets get you ready for live shopping events</p>
                            </div>
                        </div>
                        <div class="Polaris-Page-Header__RightAlign">
                            <a class="Polaris-Link" href="#" data-polaris-unstyled="true">Get Support</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="Polaris-Layout">
                    <div class="Polaris-Layout__AnnotatedSection">
                        <div class="Polaris-Layout__AnnotationWrapper">
                            <div class="Polaris-Layout__Annotation">
                                <div class="Polaris-TextContainer">
                                    <h2 class="Polaris-Heading">Fogzee Account</h2>
                                    <div class="Polaris-Layout__AnnotationDescription">
                                        <p>Create a fully immersive shopping and video experience</p>
                                    </div>
                                </div>
                            </div>
                            <div class="Polaris-Layout__AnnotationContent">
                                <div class="Polaris-Card">
                                    <div class="Polaris-Card__Section">
                                        <div class="Polaris-SettingAction">
                                            <div class="Polaris-SettingAction__Setting">
                                                <div class="Polaris-Stack">
                                                    <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                                        <div class="Polaris-AccountConnection__Content">
                                                            <div>Fogzee</div>
                                                            <div>
                                                                <span>Connected visit</span>
                                                                <span class="Polaris-TextStyle--variationSubdued">
                                                                    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" target="_blank" class="Polaris-Link" data-polaris-unstyled="true"> Fogzee Channel</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Polaris-SettingAction__Action">
                                                <a class="Polaris-Button Polaris-Button--primary account-connection-modal-btn" type="button" href="<?php echo base_url('app/disconnect?shop='.$shop_domain);?>">
                                                    <span class="Polaris-Button__Content">
                                                        <span class="Polaris-Button__Text">Disconnect</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="mt-3 mb-3">
                <div class="Polaris-Layout">
                    <div class="Polaris-Layout__AnnotatedSection">
                        <div class="Polaris-Layout__AnnotationWrapper">
                            <div class="Polaris-Layout__Annotation">
                                <div class="Polaris-TextContainer">
                                    <h2 class="Polaris-Heading">Terms & Conditions</h2>
                                    <div class="Polaris-Layout__AnnotationDescription">
                                        <p>Terms and conditions of Fogzee live shopping experience</p>
                                    </div>
                                </div>
                            </div>
                            <div class="Polaris-Layout__AnnotationContent">
                                <div>
                                    <div class="Polaris-Card">
                                        <div class="Polaris-Card__Section">
                                            <div>
                                                <a class="Polaris-Link" href="https://fogzee.com/terms-and-conditions/" target="_blank">Fogzee Terms and conditions</a>
                                                <br>
                                                <br>
                                                <a class="Polaris-Link" href="https://fogzee.com/privacy-policy/" target="_blank">Privacy Policy</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="mt-3 mb-3">
                <div class="Polaris-Layout">
                    <div class="Polaris-Layout__AnnotatedSection">
                        <div class="Polaris-Layout__AnnotationWrapper">
                            <div class="Polaris-Layout__Annotation">
                                <div class="Polaris-TextContainer">
                                    <h2 class="Polaris-Heading">How to Uninstall the app</h2>
                                    <div class="Polaris-Layout__AnnotationDescription">
                                        <p>Here the steps on how to uninstall the app</p>
                                    </div>
                                </div>
                            </div>
                            <div class="Polaris-Layout__AnnotationContent">
                                <div>
                                    <div class="Polaris-Card">
                                        <div class="Polaris-Card__Section">
                                            <div class="Polaris-SettingAction">
                                                <div class="Polaris-SettingAction__Setting">
                                                    <div class="Polaris-Stack">
                                                        <div class="Polaris-Stack__Item Polaris-Stack__Item--fill">
                                                            <div class="Polaris-AccountConnection__Content">
                                                                <h2 class="Polaris-Heading">To uninstall Fogzee App follow these steps:</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Polaris-AccountConnection__TermsOfService">
                                                <div>
                                                    <ol class="Polaris-List Polaris-List--typeNumber">
                                                        <li class="Polaris-List__Item">Click on <strong>Settings</strong> ont the left bottom corner of dashboard</li>
                                                        <li class="Polaris-List__Item">Click on <strong>Sales channels</strong></li>
                                                        <li class="Polaris-List__Item">Find in the list the Fogzee app and click on the remove icon</li>
                                                    </ol>
                                                    <div id="PolarisPortalsContainer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="PolarisPortalsContainer"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="PolarisPortalsContainer"></div>
</div>

<div>
    <div class="Polaris-FooterHelp">
        <div class="Polaris-FooterHelp__Content">
            <div class="Polaris-FooterHelp__Icon"><span class="Polaris-Icon Polaris-Icon--colorHighlight Polaris-Icon--applyColor"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
            <path fill-rule="evenodd" d="M18 10a8 8 0 1 0-16 0 8 8 0 0 0 16 0zm-9 3a1 1 0 1 0 2 0v-2a1 1 0 1 0-2 0v2zm0-6a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"></path>
          </svg></span></div>
            <div class="Polaris-FooterHelp__Text">Learn more about
                <a class="Polaris-Link" href="https://fogzee.com/" data-polaris-unstyled="true" target="_blank">Fogzee</a>
            </div>
        </div>
    </div>
    <div id="PolarisPortalsContainer"></div>
</div>

<script>
    function disconnect_app(){
        window.location.href = "<?php echo base_url('app/disconnect?shop='.$shop_domain);?>";
    }
</script>
</body>
</html>
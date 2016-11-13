<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="/manifest.json">
        <title> VSpaces :: Web UI</title>

        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="css/custom/main.css">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="page-header">
            <a href="/">
                <div id="logo-box">
                    <img src="/vspace/img/logo.png">
                </div>
            </a>
            <div id="left">
                <p class="logo">VSpaces</p>
                <p class="sub-logo">Dashboard</p>
            </div>
            <div id="right">
                <p class="email">
                    struan@vspace.com
                </p>
            </div>
        </div>
        <div class="page-content">
            <div class="page-wrapper red container">
                <div class="row">
                    <div class="col-sm-5 col-xs-12">
                        <div class="gui-column" id="floor_input">
                            <p class="gui-section-header">Input Floor-plan</p>
                            <div id="input-container"></div>
                        </div>
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div class="gui-column" id="floor_visualiser">
                            <p class="gui-section-header">Preview</p>
                            <div id="three-container"></div>
                        </div>
                    </div>
                </div>
                <div class="row button-row">
                    <div class="col-sm-3 col-xs-6 text-xs-center">
                        <button class="btn btn-info btn-action" onclick="visualise()">Visualise</button>
                    </div>
                    <div class="col-sm-3 col-xs-6 text-xs-center">
                        <button class="btn btn-info btn-action" onclick="resetGrid()">Reset</button>
                    </div>
                    <div class="col-sm-3 col-xs-6 text-xs-center">
                        <button class="btn btn-info btn-action" onclick="saveJSON()">Send to App</button>
                    </div>

<!--                    <div class="col-sm-3 col-xs-6 text-xs-center">-->
<!--                        <button class="btn btn-info btn-action">Button 4</button>-->
<!--                    </div>-->
                </div>
                <div class="row" id="info-row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="info-column" id="usage-column">
                            <p class="info-column-header" style="color: #00de7d">Usage</p>
                            <p>
                                On the left, select the cells which represent the shape of the
                                space that you want to demo. Each cell is approximately 1m².
                            </p>
                            <p>
                                To make sure that the space looks as expected, click the visualise
                                button to see an idea of how it will be presented.
                            </p>
                            <p>
                                To send the schematic to the app, simply click the "send to app"
                                button. If you have made a mistake, simply send the schematic again.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="info-column" id="install-column">
                            <p class="info-column-header" style="color: #00cacd">Application</p>
                            <p>
                                To use, simply download the app and login with your account. Choose the
                                schematic and then set the mode to "VR".
                            </p>
                            <img src="/vspace/img/download.png" id="download-img">
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="info-column" id="team-column">
                            <p class="info-column-header" style="color: #008cde">About</p>
                            <p>
                                VSpaces had its inception at Great Uni Hackathon 2016. It was designed
                                to help potential occupiers of an office or space the size available, using
                                a novel method.
                            </p>
                            <p>
                                VSpaces wouldn't have been possible without the team behind it. Tom Robinson and
                                Simona Pauleacu were responsible for the VR and the app, Raluca Cruceru for design,
                                and Struan McDonough for team lead and UI.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <p class="copy"> Copyright VSpaces :: 2016</p>
        </div>

        <script src="/vspace/js/jquery-3.1.1.min.js"></script>
        <script src="/vspace/js/bootstrap.min.js"></script>
        <script src="/vspace/js/three/build/three.min.js"></script>
        <script src="/vspace/js/three/examples/js/controls/DragControls.js"></script>
        <script src="/vspace/js/json2.js"></script>
        <script src="/vspace/js/custom/data.js"></script>
    </body>
</html>
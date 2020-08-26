<div class="app">
    <div class="brand-name">
        <a href="http://github.com/initedit-project/pifm_php"><?php echo $config["brand_name"] ?></a>  
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 padding-none">
                <div class="file-upload-box">
                    <input type="text" id="input-dummy" class="input-dummy">
                    <div class="center-add">
                        <i class="fa fa-plus" id="upload-add-btn"></i>
                        <div class="upload-progress display-none" id="upload-progress">
                            <div>Uploading...</div>
                            <div class="progress-bar">
                                <div class="progress-active"></div>
                            </div>
                            <button class="btn btn-default btn-sm cancel">close</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6 padding-none">
                <div class="top-fm">
                    <input type="range" min="87.5" class="w-100 fm-range-input" max="108"  step="0.1" 
                    value="107.9"/>
                    <div class="p-3 text-center">
                        <span class="fm-herts">107.9</span>
                        <span>MHz</span>
                    </div>
                    <button class="btn btn-primary btn-stop">STOP</button>
                    <div class="p-2 cmd"></div>
                </div>
                <div class="list-group" id="file-list-group"></div>
                <div id="file-list-template" class="display-none">
                    <div class="item list-group-item list-group-item-action">
                        <span class="name"></span>
                        <span class="ext badge badge-secondary"></span>                    
                        <!-- <i class="fa fa-download float-right ml-2"></i>                     -->
                        <i class="fa fa-play float-right ml-2"></i>                    
                        <i class="fa fa-trash float-right mr-3"></i>                    
                        <br/>
                        <span class="small time-ago"></span>
                        <span class="float-right size"></span>

                    </div>    
                </div>
                <div class="toast-message display-none"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid overlay-upload">
        <div class="row">
            <div class="col-sm-12">
                <input type="file" id="upload-input-element" class="upload-input"/>
            </div>
        </div>
    </div>
</div>
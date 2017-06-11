<script>
            var app = angular.module('demo', ['ui.uploader']);
            app.controller('uploaderCtrl', function($scope, $log, uiUploader) {
                $scope.btn_remove = function(file) {
                    $log.info('deleting=' + file);
                    uiUploader.removeFile(file);
                };

                $scope.btn_clean = function() {
                    uiUploader.removeAll();
                };

                $scope.btn_upload = function() {
                    $log.info('uploading...');
                    uiUploader.startUpload({
                        url: 'http://realtica.org/ng-uploader/demo.html',
                        concurrency: 2,
                        onProgress: function(file) {
                            $log.info(file.name + '=' + file.humanSize);
                            $scope.$apply();
                        },
                        onCompleted: function(file, response) {
                            $log.info(file + 'response' + response);
                        }
                    });
                };

                $scope.files = [];
                var element = document.getElementById('file1');
                element.addEventListener('change', function(e) {
                    var files = e.target.files;
                    uiUploader.addFiles(files);
                    $scope.files = uiUploader.getFiles();
                    $scope.$apply();
                });
            });
        </script>
        <div id="uploader" ng-controller="uploaderCtrl">
            <div class="page-header">
                <h1>Uploader</h1>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="well">
                        <div>
                            <div style="float:right;">
                                <button ng-click="btn_upload()">Upload</button>
                                <button ng-click="btn_clean()">Remove all</button>
                            </div>
                            <input type="file" id="file1" multiple/>
                        </div>
                        <div ng-repeat="file in files" style="margin-top: 20px;border-bottom-color: antiquewhite;border-bottom-style: double;">
                            <div><span>{{file.name}}</span><div style="float:right;"><span>{{file.humanSize}}</span><a ng-click="btn_remove(file)" title="Remove from list to be uploaded"><i class="icon-remove"></i></a></div>
                            </div>
                            <progress style="width:400px;" value="{{file.loaded}}" max="{{file.size}}"></progress>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
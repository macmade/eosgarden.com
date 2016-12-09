            <div class="frame">
                <div class="frame-top"></div>
                <div class="frame-highlight">
                    <img src="/uploads/image/highlights/download.png" alt="" width="905" height="285" />
                </div>
                <div class="frame-spacer">&nbsp;</div>
                <div class="frame-content">
                    <?php
                        if( !isset( $_GET[ 'download' ] ) )
                        {
                            print '<h2>Error</h2>';
                            print '<div>No download file provided...</div>';
                        }
                        else
                        {
                            $download = __ROOTDIR__
                                      . DIRECTORY_SEPARATOR
                                      . 'downloads'
                                      . DIRECTORY_SEPARATOR
                                      . $_GET[ 'download' ];
                                      
                            if( substr( basename( $download ), 0, 8 ) === 'WebStart' )
                            {
                                $location = '/s3.php?download=downloads/' . $_GET[ 'download' ];
                                $s3       = true;
                            }
                            else
                            {
                                $location = '/en/download/?download_file=' . $_GET[ 'download' ];
                                $s3       = false;
                            }
                            
                            if( !file_exists( $download ) && $s3 === false )
                            {
                                print '<h2>Error</h2>';
                                print '<div>Download file does not exist. Please contact us if the problem persists.</div>';
                            }
                            else
                            {
                                print '<div>Downloading file: <strong>' . basename( $download ) . '</strong></div>';
                                print '<script type="text/javascript">
                                        // <![CDATA[
                                        jQuery( document ).ready
                                        (
                                        function()
                                        {
                                            setTimeout
                                            (
                                                function()
                                                {
                                                    window.location.replace( \'' . $location . '\' );
                                                },
                                                1000
                                            );
                                        }
                                        );
                                        // ]]>
                                        </script>';
                            }
                        }
                    ?>
                </div>
                <div class="frame-bottom">&nbsp;</div>
            </div>


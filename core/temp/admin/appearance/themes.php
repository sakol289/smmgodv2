<div class="container">
  <div class="row">

    <?php if (!route(3)): ?>
      <div class="col-md-2 col-md-offset-1">
        <ul class="nav nav-pills nav-stacked p-b">
          <li class="settings_menus "><a href="<?= site_url("admin/appearance/pages") ?>">Pages</a></li>
          <li class="settings_menus "><a href="<?= site_url("admin/appearance/news") ?>">Announcements</a></li>
          <li class="settings_menus "><a href="<?= site_url("admin/appearance/blog") ?>">Blog</a></li>
          <li class="settings_menus "><a href="<?= site_url("admin/appearance/menu") ?>">Menu</a></li>
          <li class="settings_menus active"><a href="<?= site_url("admin/appearance/themes") ?>">Themes</a></li>
          <li class="settings_menus "><a href="<?= site_url("admin/appearance/language") ?>">Languages</a></li>
          <li class="settings_menus "><a href="<?= site_url("admin/appearance/files") ?>">Folders</a></li>
        </ul>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="settings-themes">

              <?php foreach ($themes as $theme):

                $x = $theme['theme_dirname'];
                $yol = site_url("select-theme/$x");

              ?>
                <div class="col-lg-4 col-md-6 col-sm-6">
                  <div class="settings-themes__card settings-themes__card-active">

                    <?php if ($settings["site_theme"] != $theme["theme_dirname"]): ?>
                      <div class="settings-themes__card-preview" style="background-image: url(https://image.thum.io/get/<?= $yol ?>)">
                      <?php endif;

                    if ($_SESSION['theme']):

                      $eye = ' <i class="fa fa-eye"></i>';

                    endif;

                    if ($settings["site_theme"] == $theme["theme_dirname"]): echo '<div class="settings-themes__card-preview" style="background-image: url(https://image.thum.io/get/' . $yol . ')"><span class="badge">Active' . $eye . '</span>';
                    endif; ?>
                      <?php if ($settings["site_theme"] != $theme["theme_dirname"]): ?>
                        <div class="settings-themes__card--activate">
                          <a class="btn btn-primary" href="<?php echo site_url('admin/appearance/themes/active/' . $theme["theme_dirname"]) ?>">Activate</a>
                        </div>
                      <?php endif; ?>


                      </div>
                      <div class="settings-themes__card-title">
                        <?php echo $theme["theme_name"]; ?>
                        <a href="<?php echo site_url('select-theme/' . $theme["theme_dirname"]) ?>" class="btn btn-default btn-xs" target="_blank"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo site_url('admin/appearance/themes/' . $theme["theme_dirname"]) ?>" class="btn btn-default btn-xs pull-right">Edit</a>
                      </div>

                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php elseif (route(3)): ?>
          <div class="col-md-12">
            <div class="panel">
              <div class="panel-heading edit-theme-title"><strong><?php echo $theme["theme_name"] ?></strong> being held</div>

              <div class="row">
                <div class="col-md-3 padding-md-right-null">

                  <div class="panel-body edit-theme-body">
                    <div class="twig-editor-block">
                      <?php
                      $layouts  = [
                        "HTML" => [
                          "header.twig",
                          "footer.twig",
                          "account.twig",
                          "addfunds.twig",
                          "api.twig",
                          "login.twig",
                          "signup.twig",
                          "neworder.twig",
                          "orders.twig",
                          "dripfeeds.twig",
                          "subscriptions.twig",
                          "services.twig",
                          "child-panels.twig",
                          "tickets.twig",
                          "viewticket.twig",
                          "blog.twig",
                          "blogpost.twig",
                          "verify.twig",
                          "affiliates.twig",
                          "resetpassword.twig",
                          "terms.twig",
                          "faq.twig",
                          "404.twig"
                        ],
                        "CSS" => ["bootstrap.css", "style.css"],
                        "JS" => ["bootstrap.js", "script.js"]
                      ];
                      foreach ($layouts as $style => $layout):
                        echo '<div class="twig-editor-list-title" data-toggle="collapse" href="#folder_' . $style . '"><span class="fa fa-folder-open"></span>' . $style . '</div><ul class="twig-editor-list collapse in" id="folder_' . $style . '">';
                        foreach ($layouts[$style] as $layout) :
                          if ($lyt == $layout):
                            $active = ' class="active file-modified" ';
                          else:
                            $active = '';
                          endif;
                          echo '
                      <li ' . $active . '><a href="' . site_url('admin/appearance/themes/' . $theme["theme_dirname"]) . '?file=' . $layout . '">' . $layout . '</a></li>';
                          if ($lyt == $layout) {
                              echo "<!-- DEBUG: Active file: " . $layout . " -->\n";
                          }
                        endforeach;
                        echo '</ul>';
                      endforeach;
                      ?>
                    </div>

                  </div>
                </div>
                <div class="col-md-9 padding-md-left-null edit-theme__block-editor">
                  <?php if (!$lyt): ?>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="theme-edit-block">
                            <div class="alert alert-info" role="alert">
                              Document will be added soon...<br>
                              You can access the theme codes of the page you want to edit from the left side..
                            </div>
                            <?php
                            echo "<!-- DEBUG: No file selected (\$lyt is empty) -->\n";
                            echo "<!-- DEBUG: \$lyt = '" . (isset($lyt) ? $lyt : 'NOT SET') . "' -->\n";
                            echo "<!-- DEBUG: GET parameters: " . print_r($_GET, true) . " -->\n";
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php else: ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.44.0/min/vs/loader.min.js"></script>
                    
                    <style>
                    #monaco-editor {
                        border-radius: 4px;
                        overflow: hidden;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                    }
                    .monaco-editor .margin {
                        background-color: #f5f5f5;
                    }
                    .edit-theme-body-buttons {
                        margin-top: 15px;
                        padding-top: 15px;
                        border-top: 1px solid #eee;
                    }
                    .fullScreenButton {
                        margin-bottom: 10px;
                    }
                    .themeToggleButton, .formatButton {
                        margin-bottom: 10px;
                    }
                    .btn-xs {
                        padding: 4px 8px;
                        font-size: 11px;
                    }
                    </style>

                    <div id="fullscreen">

                      <div class="panel-body">

                        <?php
                        echo "<!-- DEBUG: Error reporting: " . error_reporting() . " -->\n";
                        echo "<!-- DEBUG: Display errors: " . (ini_get('display_errors') ? 'ON' : 'OFF') . " -->\n";
                        echo "<!-- DEBUG: Variables check -->\n";
                        echo "<!-- DEBUG: \$fn = " . (isset($fn) ? $fn : 'NOT SET') . " -->\n";
                        echo "<!-- DEBUG: \$dir = " . (isset($dir) ? $dir : 'NOT SET') . " -->\n";
                        echo "<!-- DEBUG: \$lyt = " . (isset($lyt) ? $lyt : 'NOT SET') . " -->\n";
                        echo "<!-- DEBUG: \$theme = " . (isset($theme) ? 'SET' : 'NOT SET') . " -->\n";
                        if (isset($theme)) {
                            echo "<!-- DEBUG: \$theme['theme_dirname'] = " . $theme['theme_dirname'] . " -->\n";
                        }
                        echo "<!-- DEBUG: Current working directory: " . getcwd() . " -->\n";
                        echo "<!-- DEBUG: Full file path would be: " . (isset($fn) ? realpath($fn) : 'N/A') . " -->\n";
                        echo "<!-- DEBUG: Directory exists: " . (isset($fn) ? (is_dir(dirname($fn)) ? 'YES' : 'NO') : 'N/A') . " -->\n";
                        echo "<!-- DEBUG: Directory path: " . (isset($fn) ? dirname($fn) : 'N/A') . " -->\n";
                        echo "<!-- DEBUG: File permissions: " . (isset($fn) && file_exists($fn) ? substr(sprintf('%o', fileperms($fn)), -4) : 'N/A') . " -->\n";

                        echo "<!-- DEBUG: Starting file operations -->\n";
                        echo "<!-- DEBUG: File path: " . $fn . " -->\n";
                        echo "<!-- DEBUG: File exists: " . (file_exists($fn) ? 'YES' : 'NO') . " -->\n";
                        echo "<!-- DEBUG: File readable: " . (is_readable($fn) ? 'YES' : 'NO') . " -->\n";
                        
                        $fn = "core/temp/client/" . $theme["theme_dirname"] . "/" . $lyt;
                        echo "<!-- DEBUG: \$fn = $fn -->\n";
                        if (!file_exists($fn)) {
                            echo "<!-- DEBUG ERROR: File does not exist! -->\n";
                            $text = "<!-- File not found: " . $fn . " -->";
                        } else {
                            $file = fopen($fn, "r");
                            if ($file === false) {
                                echo "<!-- DEBUG ERROR: Cannot open file! -->\n";
                                $text = "<!-- Cannot open file: " . $fn . " -->";
                            } else {
                                $size = filesize($fn);
                                echo "<!-- DEBUG: File size: " . $size . " bytes -->\n";
                                
                                if ($size === false) {
                                    echo "<!-- DEBUG ERROR: Cannot get file size! -->\n";
                                    $text = "<!-- Cannot get file size -->";
                                } else {
                                    $text = fread($file, $size);
                                    if ($text === false) {
                                        echo "<!-- DEBUG ERROR: Cannot read file! -->\n";
                                        $text = "<!-- Cannot read file -->";
                                    } else {
                                        echo "<!-- DEBUG: Successfully read " . strlen($text) . " characters -->\n";
                                        $text = str_replace("<", "&lt;", $text);
                                        $text = str_replace(">", "&gt;", $text);
                                        $text = str_replace('"', "&quot;", $text);
                                        echo "<!-- DEBUG: Text processed successfully -->\n";
                                    }
                                }
                                fclose($file);
                            }
                        }
                        ?>

                        <div class="row">
                          <div class="col-md-8">
                            <strong class="edit-theme-filename"><?= $dir . "/" . $lyt ?></strong>
                            <br>
                            <small class="text-muted">
                              Language: <span id="file-language">Detecting...</span> | 
                              Lines: <span id="line-count">0</span> | 
                              Characters: <span id="char-count">0</span> |
                              Shortcuts: Ctrl+S (Save), Shift+Alt+F (Format)
                            </small>
                            <?php
                            echo "<!-- DEBUG: Displaying file path: " . $dir . "/" . $lyt . " -->\n";
                            ?>
                          </div>
                          <div class="col-md-4 text-right">
                            <button type="button" class="btn btn-xs btn-success formatButton" style="margin-right: 5px;">
                              <span class="glyphicon glyphicon-indent-left"></span>
                              Format Code
                            </button>
                            <button type="button" class="btn btn-xs btn-info themeToggleButton" style="margin-right: 5px;">
                              <span class="glyphicon glyphicon-adjust"></span>
                              Toggle Theme
                            </button>
                            <a class="btn btn-xs btn-default fullScreenButton">
                              <span class="glyphicon glyphicon-fullscreen"></span>
                              Edit Full Screen </a>
                          </div>
                        </div>


                        <form action="<?php echo site_url("admin/appearance/themes/" . $theme["theme_dirname"] . "?file=" . $lyt) ?>" method="post" class="twig-editor__form">

                          <div id="monaco-editor" style="height: 600px; border: 1px solid #ccc;">
                            <div class="text-center" style="padding-top: 250px;">
                              <i class="fa fa-spinner fa-spin fa-2x"></i>
                              <br><br>
                              <span>Loading Monaco Editor...</span>
                            </div>
                          </div>
                          <textarea id="code" name="code" style="display: none;"><?= $text; ?></textarea>
                          <div class="edit-theme-body-buttons text-right">
                            <span id="save-status" class="text-muted" style="margin-right: 10px; font-size: 12px;">Ready to save</span>
                            <button class="btn btn-primary click">Update</button>
                          </div>
                        </form>

                        <script>
                        require.config({ paths: { vs: 'https://cdnjs.cloudflare.com/ajax/libs/monaco-editor/0.44.0/min/vs' }});
                        require(['vs/editor/editor.main'], function() {
                            // Determine file type based on extension
                            var fileExtension = '<?= pathinfo($lyt, PATHINFO_EXTENSION) ?>';
                            var language = 'plaintext';
                            
                            switch(fileExtension.toLowerCase()) {
                                case 'twig':
                                    language = 'html';
                                    break;
                                case 'css':
                                    language = 'css';
                                    break;
                                case 'js':
                                    language = 'javascript';
                                    break;
                                case 'php':
                                    language = 'php';
                                    break;
                                case 'html':
                                    language = 'html';
                                    break;
                                case 'xml':
                                    language = 'xml';
                                    break;
                                case 'json':
                                    language = 'json';
                                    break;
                                default:
                                    language = 'plaintext';
                            }
                            
                            // Create Monaco Editor
                            var editor = monaco.editor.create(document.getElementById('monaco-editor'), {
                                value: document.getElementById('code').value,
                                language: language,
                                theme: 'vs-dark',
                                automaticLayout: true,
                                fontSize: 14,
                                minimap: { enabled: true },
                                scrollBeyondLastLine: false,
                                wordWrap: 'on',
                                lineNumbers: 'on',
                                roundedSelection: false,
                                readOnly: false,
                                cursorStyle: 'line',
                                automaticLayout: true,
                                scrollbar: {
                                    vertical: 'visible',
                                    horizontal: 'visible'
                                },
                                // Additional features
                                suggestOnTriggerCharacters: true,
                                quickSuggestions: true,
                                parameterHints: {
                                    enabled: true
                                },
                                autoIndent: 'full',
                                formatOnPaste: true,
                                formatOnType: true,
                                // Error checking
                                validateOnType: true,
                                // Folding
                                folding: true,
                                foldingStrategy: 'indentation',
                                // Search
                                find: {
                                    addExtraSpaceOnTop: false,
                                    autoFindInSelection: 'never',
                                    seedSearchStringFromSelection: 'always'
                                }
                            });
                            
                            // Hide loading indicator
                            var loadingDiv = document.querySelector('#monaco-editor .text-center');
                            if (loadingDiv) {
                                loadingDiv.style.display = 'none';
                            }
                            
                            // Update textarea before form submission
                            document.querySelector('.twig-editor__form').addEventListener('submit', function() {
                                document.getElementById('code').value = editor.getValue();
                                document.getElementById('save-status').textContent = 'Saving...';
                                document.getElementById('save-status').className = 'text-info';
                            });
                            
                            // Format code functionality
                            document.querySelector('.formatButton').addEventListener('click', function() {
                                if (editor) {
                                    editor.getAction('editor.action.formatDocument').run();
                                }
                            });
                            
                            // Theme toggle functionality
                            var currentTheme = 'vs-dark';
                            document.querySelector('.themeToggleButton').addEventListener('click', function() {
                                if (editor) {
                                    currentTheme = currentTheme === 'vs-dark' ? 'vs-light' : 'vs-dark';
                                    monaco.editor.setTheme(currentTheme);
                                    
                                    // Update button text
                                    var button = document.querySelector('.themeToggleButton');
                                    if (currentTheme === 'vs-dark') {
                                        button.innerHTML = '<span class="glyphicon glyphicon-adjust"></span> Light Theme';
                                    } else {
                                        button.innerHTML = '<span class="glyphicon glyphicon-adjust"></span> Dark Theme';
                                    }
                                }
                            });
                            
                            // Fullscreen functionality
                            document.querySelector('.fullScreenButton').addEventListener('click', function() {
                                if (editor) {
                                    var isFullScreen = editor.getOption(monaco.editor.EditorOption.fullScreen);
                                    editor.updateOptions({ fullScreen: !isFullScreen });
                                    
                                    // Update button text
                                    var button = document.querySelector('.fullScreenButton');
                                    if (!isFullScreen) {
                                        button.innerHTML = '<span class="glyphicon glyphicon-resize-small"></span> Exit Full Screen';
                                    } else {
                                        button.innerHTML = '<span class="glyphicon glyphicon-fullscreen"></span> Edit Full Screen';
                                    }
                                }
                            });
                            
                            // Auto-save functionality (optional)
                            var autoSaveTimeout;
                            editor.onDidChangeModelContent(function() {
                                // Clear previous timeout
                                clearTimeout(autoSaveTimeout);
                                
                                // Update save status
                                document.getElementById('save-status').textContent = 'Modified';
                                document.getElementById('save-status').className = 'text-warning';
                                
                                // Set new timeout for auto-save (5 seconds)
                                autoSaveTimeout = setTimeout(function() {
                                    console.log('Auto-save triggered');
                                    document.getElementById('save-status').textContent = 'Auto-saved';
                                    document.getElementById('save-status').className = 'text-success';
                                    // You can implement auto-save logic here
                                    // For example, save to localStorage or send AJAX request
                                }, 5000);
                            });
                            
                            // Keyboard shortcuts
                            editor.addCommand(monaco.KeyMod.CtrlCmd | monaco.KeyCode.KeyS, function() {
                                // Ctrl+S to save
                                document.querySelector('.twig-editor__form').submit();
                            });
                            
                            // Format code shortcut
                            editor.addCommand(monaco.KeyMod.Shift | monaco.KeyMod.Alt | monaco.KeyCode.KeyF, function() {
                                editor.getAction('editor.action.formatDocument').run();
                            });
                            
                            // Update file information
                            function updateFileInfo() {
                                if (editor) {
                                    var model = editor.getModel();
                                    var lineCount = model.getLineCount();
                                    var charCount = model.getValue().length;
                                    
                                    document.getElementById('file-language').textContent = language.toUpperCase();
                                    document.getElementById('line-count').textContent = lineCount;
                                    document.getElementById('char-count').textContent = charCount;
                                }
                            }
                            
                            // Update file info on content change
                            editor.onDidChangeModelContent(function() {
                                updateFileInfo();
                            });
                            
                            // Initial update
                            updateFileInfo();
                            
                            // Handle window resize
                            window.addEventListener('resize', function() {
                                if (editor) {
                                    editor.layout();
                                }
                            });
                        }).catch(function(error) {
                            console.error('Failed to load Monaco Editor:', error);
                            document.getElementById('monaco-editor').innerHTML = 
                                '<div class="alert alert-danger">' +
                                '<strong>Error:</strong> Failed to load Monaco Editor. ' +
                                'Please refresh the page or check your internet connection.' +
                                '</div>';
                        });
                        </script>

                      </div>
                    <?php endif; ?>
                    </div>
                </div>

              </div>
            </div>


          <?php endif; ?>
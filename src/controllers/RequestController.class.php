<?php
    class RequestController {
        private static $request;
        private static $body;
        private static $url;

        public function __construct($url, $body) {          
            self::$body = json_decode($body);
            self::isValidUrl($url);
        }

        public static function getRequest() {
            return self::$request;
        }

        private static function isValidUrl($url) {

            if(isset($url)) {
                
                $array = explode('/', $url);

                if($array[0] == 'api') {

                    self::$url .= array_shift($array);
                    self::$url .= '/';

                    if(!empty($array) && $array[0] == 'user') {

                        self::$url .= array_shift($array);
                        self::$url .= '/';

                        if(empty($array) || $array[0] == '') {

                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'method'=>'POST', 'body'=>self::$body), JSON_UNESCAPED_SLASHES);

                        } else {

                            $param = array_shift($array);

                            if(is_numeric($param) && (empty($array) || $array[0] == '')) {

                                self::$url .= ':id';
                                self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                            } else {
                                
                                self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'));
                            }
                        }

                    } elseif(!empty($array) && $array[0] == 'users') {

                        self::$url .= array_shift($array);
                        self::$url .= '/';

                        if(empty($array) || $array[0] == '') {

                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                        } else {

                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                        }

                    } elseif(!empty($array) && $array[0] == 'carpool') {

                        self::$url .= array_shift($array);
                        self::$url .= '/';
                        
                        if(empty($array) || $array[0] == '') {

                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);

                        } else {

                            if($array[0] == 'request') {

                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && is_numeric($array[0])) {

                                    $param = array_shift($array);
                                    self::$url .= ':id';

                                    if(empty($array) || $array[0] == '') {

                                        self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif(empty($array) || $array[0] == '') {

                                    self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'method'=>'POST', 'body'=>self::$body), JSON_UNESCAPED_SLASHES);

                                } else {

                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } elseif($array[0] == 'requests') {

                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && $array[0] == 'others') {

                                    self::$url .= array_shift($array);
                                    self::$url .= '/';

                                    if(!empty($array) && is_numeric($array[0])) {

                                        $param = array_shift($array);
                                        self::$url .= ':id';
                                        
                                        if(empty($array) || $array[0] == '') {

                                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);
    
                                        } else {
    
                                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                        }

                                    } else {
                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif(!empty($array) && $array[0] == 'user') {

                                    self::$url .= array_shift($array);
                                    self::$url .= '/';

                                    if(!empty($array) && is_numeric($array[0])) {

                                        $param = array_shift($array);
                                        self::$url .= ':id';
                                        
                                        if(empty($array) || $array[0] == '') {

                                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);
    
                                        } else {
    
                                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                        }

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif(empty($array) || $array[0] == '') {

                                    self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                } else {
                                    
                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } elseif($array[0] == 'offer') {

                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && is_numeric($array[0])) {

                                    $param = array_shift($array);
                                    self::$url .= ':id';

                                    if(empty($array) || $array[0] == '') {

                                        self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif(empty($array) || $array[0] == '') {

                                    self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'method'=>'POST', 'body'=>self::$body), JSON_UNESCAPED_SLASHES);

                                } else {

                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } elseif($array[0] == 'offers') {
                                
                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && $array[0] == 'others') {

                                    self::$url .= array_shift($array);
                                    self::$url .= '/';

                                    if(!empty($array) && is_numeric($array[0])) {

                                        $param = array_shift($array);
                                        self::$url .= ':id';
                                        
                                        if(empty($array) || $array[0] == '') {

                                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);
    
                                        } else {
    
                                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                        }

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif(!empty($array) && $array[0] == 'user') {
                                    
                                    self::$url .= array_shift($array);
                                    self::$url .= '/';

                                    if(!empty($array) && is_numeric($array[0])) {

                                        $param = array_shift($array);
                                        self::$url .= ':id';
                                        
                                        if(empty($array) || $array[0] == '') {

                                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);
    
                                        } else {
    
                                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                        }

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif(empty($array) || $array[0] == '') {

                                    self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                } else {
                                    
                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } elseif($array[0] == 'match') {
                                
                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && is_numeric($array[0])) {

                                    $param = array_shift($array);
                                    self::$url .= ':id';
                                    
                                    if(empty($array) || $array[0] == '') {

                                        self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif(empty($array) || $array[0] == '') {

                                    self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'method'=>'POST', 'body'=>self::$body), JSON_UNESCAPED_SLASHES);

                                } elseif($array[0] == 'request') {

                                    self::$url .= array_shift($array);
                                    self::$url .= '/';

                                    if(!empty($array) && is_numeric($array[0])) {

                                        $param = array_shift($array);
                                        self::$url .= ':id';
                                        
                                        if(empty($array) || $array[0] == '') {

                                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);
    
                                        } else {
    
                                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                        }
    
                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif($array[0] == 'offer') {

                                    self::$url .= array_shift($array);
                                    self::$url .= '/';

                                    if(!empty($array) && is_numeric($array[0])) {

                                        $param = array_shift($array);
                                        self::$url .= ':id';

                                        if(empty($array)){

                                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                        } elseif($array[0] == 'request') {

                                            self::$url .= '/';
                                            self::$url .= array_shift($array);
                                            self::$url .= '/';

                                            if(!empty($array) && is_numeric($array[0])) {

                                                $param2 = array_shift($array);
                                                self::$url .= ':id';
                                                self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'params'=>[$param, $param2], 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                            } else {

                                                self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                            }

                                        } elseif (empty($array) || $array[0] == "") {

                                            self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                        } else {
                                            
                                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                        }
    
                                    } else {
                                        
                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } elseif($array[0] == 'accept') {

                                    self::$url .= array_shift($array);
                                    self::$url .= '/';

                                    if($array[0] == 'offer') {

                                        self::$url .= array_shift($array);
                                        self::$url .= '/';

                                        if(!empty($array) && is_numeric($array[0])) {

                                            $param = array_shift($array);
                                            self::$url .= ':id/';

                                            if(!empty($array) && $array[0] == 'request') {

                                                self::$url .= array_shift($array);
                                                self::$url .= '/';

                                                if(!empty($array) && is_numeric($array[0])) {
                                                    
                                                    $param2 = array_shift($array);
                                                    self::$url .= ':id';
                                                    self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'params'=>[$param, $param2], 'method'=>'GET'), JSON_UNESCAPED_SLASHES);

                                                } else {

                                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                                }

                                            } else {

                                                self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                            }

                                        } else {

                                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                        }

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } else {

                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } else {

                                self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                            }
                        }

                    } elseif(!empty($array) && $array[0] == 'cancel') {

                        self::$url .= array_shift($array);
                        self::$url .= '/';

                        if(empty($array) || $array[0] == '') {

                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);

                        } else {

                            if($array[0] == 'request') {

                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && is_numeric($array[0])) {

                                    $param = array_shift($array);
                                    self::$url .= ':id';

                                    if(empty($array) || $array[0] == '') {

                                        self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'PUT'), JSON_UNESCAPED_SLASHES);

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } else {
                                    
                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } elseif ($array[0] == 'offer') {

                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && is_numeric($array[0])) {

                                    $param = array_shift($array);
                                    self::$url .= ':id';

                                    if(empty($array) || $array[0] == '') {

                                        self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'PUT'), JSON_UNESCAPED_SLASHES);

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } else {
                                    
                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } else {

                                self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                            }
                        }

                    } elseif(!empty($array) && $array[0] == 'vacancy') {

                        self::$url .= array_shift($array);
                        self::$url .= '/';

                        if(empty($array) || $array[0] == '') {

                            self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);

                        } else {

                            if($array[0] == 'add') {

                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && is_numeric($array[0])) {

                                    $param = array_shift($array);
                                    self::$url .= ':id';

                                    if(empty($array) || $array[0] == '') {

                                        self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'PUT'), JSON_UNESCAPED_SLASHES);

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } else {
                                    
                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } elseif($array[0] == 'remove') {

                                self::$url .= array_shift($array);
                                self::$url .= '/';

                                if(!empty($array) && is_numeric($array[0])) {

                                    $param = array_shift($array);
                                    self::$url .= ':id';

                                    if(empty($array) || $array[0] == '') {

                                        self::$request = json_encode(array('status'=>'200', 'message'=>self::$url, 'param'=>$param, 'method'=>'PUT'), JSON_UNESCAPED_SLASHES);

                                    } else {

                                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                    }

                                } else {
                                    
                                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                                }

                            } else {

                                self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                            }
                        }

                    } else {

                        self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                    }

                } else {

                    self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
                }

            } else {

                self::$request = json_encode(array('status'=>'400', 'message'=>'Bad Request'), JSON_UNESCAPED_SLASHES);
            }
        }
    }
?>
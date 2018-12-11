<?php

class errorErrorHandler extends \FluitoPHP\ErrorHandler\ErrorHandler {

    public function indexHandle($e) {

        $this->
                Response()->
                SetHTTPCode(500, $e->
                        getMessage());

        $this->
                Set('excpMsg', $e->
                        getMessage());

        $this->
                Set('excpTrc', $e->
                        getTrace());
    }

    public function httpHandle($e) {

        $this->
                Response()->
                SetHTTPCode($e->
                        GetHttpCode(), $e->
                        getMessage());

        $this->
                Set('excpMsg', $e->
                        getMessage());

        $this->
                Set('excpTrc', $e->
                        getTrace());
    }

    public function http404Handle($e) {

        $this->
                Response()->
                SetHTTPCode($e->
                        GetHttpCode(), $e->
                        getMessage());

        $this->
                Set('excpMsg', $e->
                        getMessage());

        $this->
                Set('excpTrc', $e->
                        getTrace());
    }

}

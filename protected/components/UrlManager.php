<?php
class UrlManager extends CUrlManager
{
    private $hasDash = false;
    
    // remove dash to map dashed url with undashed controller/action
    public function parseUrl($request)
    {
        $url = parent::parseUrl($request);
        $this->hasDash = substr_count($url, "-") > 0;
        return $this->hasDash ? str_replace('-', '', $url) : $url;
    }
    
    // restore dash for GET parameters injected from path
    public function parsePathInfo($pathInfo)
    {
        if($this->hasDash) {
            $oldPath = explode("/", $pathInfo);
            $paths = explode("/", Yii::app()->request->pathInfo);
            for($i=0; $i < count($oldPath); $i++) {
                $newPath[] = $oldPath[$i];
                $key = array_search($oldPath[$i], $paths);
                if($key!==false) {
                    $newPath[] = $paths[$key+1];
                    $i++;
                }
            }
            $pathInfo = implode("/", $newPath);
        }
        parent::parsePathInfo($pathInfo);
    }
    
}
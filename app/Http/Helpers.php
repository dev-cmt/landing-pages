<?php

//return file uploaded via uploader
/*if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Media::find($id)) != null) {
            return my_asset($asset->file_url);
        }
        return null;
    }
}*/

/*if (! function_exists('my_asset')) {
    function my_asset($path, $secure = null)
    {
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return Storage::disk('s3')->url($path);
        }
        else {
            return app('url')->asset($path, $secure);
        }
    }
}*/

/*if (! function_exists('static_asset')) {
    function static_asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }
}*/

if (! function_exists('format_title')) {
    /**
     * Format title: English → ucfirst, Bengali → 그대로
     * @param string $title
     * @return string
     */
    function format_title(string $title): string
    {
        // Check if first character is English letter
        if (preg_match('/^[a-zA-Z]/u', $title)) {
            return ucfirst($title); // English → first letter capital
        }

        // Otherwise return original (Bangla or other)
        return mb_convert_case($title, MB_CASE_TITLE, "UTF-8");
    }
}

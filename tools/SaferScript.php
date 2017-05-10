<?php
namespace tools;

class SaferScript
{
    public $source;
    public $allowedCalls;
    public function __construct($scriptText)
    {
        $this->source = $scriptText;
        $this->allowedCalls = array();
    }
    public function allowHarmlessCalls()
    {
        $this->allowedCalls = array_merge(array("true","false"), array("echo","print","include","include_once","require","require_once"), json_decode('["zend_version","func_num_args","func_get_arg","func_get_args","strlen","strcmp","strncmp","strcasecmp","strncasecmp","each","error_reporting","define","defined","get_class","get_called_class","get_parent_class","method_exists","property_exists","class_exists","interface_exists","trait_exists","function_exists","class_alias","get_included_files","get_required_files","is_subclass_of","is_a","get_class_vars","get_object_vars","get_class_methods","trigger_error","user_error","set_error_handler","restore_error_handler","set_exception_handler","restore_exception_handler","get_declared_classes","get_declared_traits","get_declared_interfaces","get_defined_functions","get_defined_vars","create_function","get_resource_type","get_resources","get_loaded_extensions","extension_loaded","get_extension_funcs","get_defined_constants","debug_backtrace","debug_print_backtrace","gc_mem_caches","gc_collect_cycles","gc_enabled","gc_enable","gc_disable","strtotime","date","idate","gmdate","mktime","gmmktime","checkdate","strftime","gmstrftime","time","localtime","getdate","date_create","date_create_immutable","date_create_from_format","date_create_immutable_from_format","date_parse","date_parse_from_format","date_get_last_errors","date_format","date_modify","date_add","date_sub","date_timezone_get","date_timezone_set","date_offset_get","date_diff","date_time_set","date_date_set","date_isodate_set","date_timestamp_set","date_timestamp_get","timezone_open","timezone_name_get","timezone_name_from_abbr","timezone_offset_get","timezone_transitions_get","timezone_location_get","timezone_identifiers_list","timezone_abbreviations_list","timezone_version_get","date_interval_create_from_date_string","date_interval_format","date_default_timezone_set","date_default_timezone_get","date_sunrise","date_sunset","date_sun_info","libxml_set_streams_context","libxml_use_internal_errors","libxml_get_last_error","libxml_clear_errors","libxml_get_errors","libxml_disable_entity_loader","libxml_set_external_entity_loader","openssl_get_cert_locations","openssl_spki_new","openssl_spki_verify","openssl_spki_export","openssl_spki_export_challenge","openssl_pkey_free","openssl_pkey_new","openssl_pkey_export","openssl_pkey_export_to_file","openssl_pkey_get_private","openssl_pkey_get_public","openssl_pkey_get_details","openssl_free_key","openssl_get_privatekey","openssl_get_publickey","openssl_x509_read","openssl_x509_free","openssl_x509_parse","openssl_x509_checkpurpose","openssl_x509_check_private_key","openssl_x509_export","openssl_x509_fingerprint","openssl_x509_export_to_file","openssl_pkcs12_export","openssl_pkcs12_export_to_file","openssl_pkcs12_read","openssl_csr_new","openssl_csr_export","openssl_csr_export_to_file","openssl_csr_sign","openssl_csr_get_subject","openssl_csr_get_public_key","openssl_digest","openssl_encrypt","openssl_decrypt","openssl_cipher_iv_length","openssl_sign","openssl_verify","openssl_seal","openssl_open","openssl_pbkdf2","openssl_pkcs7_verify","openssl_pkcs7_decrypt","openssl_pkcs7_sign","openssl_pkcs7_encrypt","openssl_private_encrypt","openssl_private_decrypt","openssl_public_encrypt","openssl_public_decrypt","openssl_get_md_methods","openssl_get_cipher_methods","openssl_dh_compute_key","openssl_random_pseudo_bytes","openssl_error_string","preg_match","preg_match_all","preg_replace","preg_replace_callback","preg_replace_callback_array","preg_filter","preg_split","preg_quote","preg_grep","preg_last_error","readgzfile","gzrewind","gzclose","gzeof","gzgetc","gzgets","gzgetss","gzread","gzopen","gzpassthru","gzseek","gztell","gzwrite","gzputs","gzfile","gzcompress","gzuncompress","gzdeflate","gzinflate","gzencode","gzdecode","zlib_encode","zlib_decode","zlib_get_coding_type","deflate_init","deflate_add","inflate_init","inflate_add","ob_gzhandler","filter_input","filter_var","filter_input_array","filter_var_array","filter_list","filter_has_var","filter_id","hash","hash_file","hash_hmac","hash_hmac_file","hash_init","hash_update","hash_update_stream","hash_update_file","hash_final","hash_copy","hash_algos","hash_pbkdf2","hash_equals","mhash_keygen_s2k","mhash_get_block_size","mhash_get_hash_name","mhash_count","mhash","pcntl_fork","pcntl_waitpid","pcntl_wait","pcntl_signal","pcntl_signal_dispatch","pcntl_wifexited","pcntl_wifstopped","pcntl_wifsignaled","pcntl_wexitstatus","pcntl_wtermsig","pcntl_wstopsig","pcntl_exec","pcntl_alarm","pcntl_get_last_error","pcntl_errno","pcntl_strerror","pcntl_getpriority","pcntl_setpriority","pcntl_sigprocmask","pcntl_sigwaitinfo","pcntl_sigtimedwait","pcntl_wifcontinued","session_name","session_module_name","session_save_path","session_id","session_regenerate_id","session_decode","session_encode","session_start","session_destroy","session_unset","session_set_save_handler","session_cache_limiter","session_cache_expire","session_set_cookie_params","session_get_cookie_params","session_write_close","session_abort","session_reset","session_status","session_register_shutdown","session_commit","spl_classes","spl_autoload","spl_autoload_extensions","spl_autoload_register","spl_autoload_unregister","spl_autoload_functions","spl_autoload_call","class_parents","class_implements","class_uses","spl_object_hash","iterator_to_array","iterator_count","iterator_apply","constant","bin2hex","hex2bin","sleep","usleep","time_nanosleep","time_sleep_until","strptime","flush","wordwrap","htmlspecialchars","htmlentities","html_entity_decode","htmlspecialchars_decode","get_html_translation_table","sha1","sha1_file","md5","md5_file","crc32","iptcparse","iptcembed","getimagesize","getimagesizefromstring","image_type_to_mime_type","image_type_to_extension","phpinfo","phpversion","phpcredits","php_sapi_name","php_uname","php_ini_scanned_files","php_ini_loaded_file","strnatcmp","strnatcasecmp","substr_count","strspn","strcspn","strtok","strtoupper","strtolower","strpos","stripos","strrpos","strripos","strrev","hebrev","hebrevc","nl2br","basename","dirname","pathinfo","stripslashes","stripcslashes","strstr","stristr","strrchr","str_shuffle","str_word_count","str_split","strpbrk","substr_compare","strcoll","money_format","substr","substr_replace","quotemeta","ucfirst","lcfirst","ucwords","strtr","addslashes","addcslashes","rtrim","str_replace","str_ireplace","str_repeat","count_chars","chunk_split","trim","ltrim","strip_tags","similar_text","explode","implode","join","setlocale","localeconv","nl_langinfo","soundex","levenshtein","chr","ord","parse_str","str_getcsv","str_pad","chop","strchr","sprintf","printf","vprintf","vsprintf","fprintf","vfprintf","sscanf","fscanf","parse_url","urlencode","urldecode","rawurlencode","rawurldecode","http_build_query","readlink","linkinfo","symlink","link","unlink","exec","system","escapeshellcmd","escapeshellarg","passthru","shell_exec","proc_open","proc_close","proc_terminate","proc_get_status","proc_nice","rand","srand","getrandmax","mt_rand","mt_srand","mt_getrandmax","random_bytes","random_int","getservbyname","getservbyport","getprotobyname","getprotobynumber","getmyuid","getmygid","getmypid","getmyinode","getlastmod","base64_decode","base64_encode","password_hash","password_get_info","password_needs_rehash","password_verify","convert_uuencode","convert_uudecode","abs","ceil","floor","round","sin","cos","tan","asin","acos","atan","atanh","atan2","sinh","cosh","tanh","asinh","acosh","expm1","log1p","pi","is_finite","is_nan","is_infinite","pow","exp","log","log10","sqrt","hypot","deg2rad","rad2deg","bindec","hexdec","octdec","decbin","decoct","dechex","base_convert","number_format","fmod","intdiv","inet_ntop","inet_pton","ip2long","long2ip","getenv","putenv","getopt","sys_getloadavg","microtime","gettimeofday","getrusage","uniqid","quoted_printable_decode","quoted_printable_encode","convert_cyr_string","get_current_user","set_time_limit","header_register_callback","get_cfg_var","get_magic_quotes_gpc","get_magic_quotes_runtime","error_log","error_get_last","error_clear_last","call_user_func","call_user_func_array","forward_static_call","forward_static_call_array","serialize","unserialize","var_dump","var_export","debug_zval_dump","print_r","memory_get_usage","memory_get_peak_usage","register_shutdown_function","register_tick_function","unregister_tick_function","highlight_file","show_source","highlight_string","php_strip_whitespace","ini_get","ini_get_all","ini_set","ini_alter","ini_restore","get_include_path","set_include_path","restore_include_path","setcookie","setrawcookie","header","header_remove","headers_sent","headers_list","http_response_code","connection_aborted","connection_status","ignore_user_abort","parse_ini_file","parse_ini_string","is_uploaded_file","move_uploaded_file","gethostbyaddr","gethostbyname","gethostbynamel","gethostname","dns_check_record","checkdnsrr","dns_get_mx","getmxrr","dns_get_record","intval","floatval","doubleval","strval","boolval","gettype","settype","is_null","is_resource","is_bool","is_int","is_float","is_integer","is_long","is_double","is_real","is_numeric","is_string","is_array","is_object","is_scalar","is_callable","pclose","popen","readfile","rewind","rmdir","umask","fclose","feof","fgetc","fgets","fgetss","fread","fopen","fpassthru","ftruncate","fstat","fseek","ftell","fflush","fwrite","fputs","mkdir","rename","copy","tempnam","tmpfile","file","file_get_contents","file_put_contents","stream_select","stream_context_create","stream_context_set_params","stream_context_get_params","stream_context_set_option","stream_context_get_options","stream_context_get_default","stream_context_set_default","stream_filter_prepend","stream_filter_append","stream_filter_remove","stream_socket_client","stream_socket_server","stream_socket_accept","stream_socket_get_name","stream_socket_recvfrom","stream_socket_sendto","stream_socket_enable_crypto","stream_socket_shutdown","stream_socket_pair","stream_copy_to_stream","stream_get_contents","stream_supports_lock","fgetcsv","fputcsv","flock","get_meta_tags","stream_set_read_buffer","stream_set_write_buffer","set_file_buffer","stream_set_chunk_size","stream_set_blocking","socket_set_blocking","stream_get_meta_data","stream_get_line","stream_wrapper_register","stream_register_wrapper","stream_wrapper_unregister","stream_wrapper_restore","stream_get_wrappers","stream_get_transports","stream_resolve_include_path","stream_is_local","get_headers","stream_set_timeout","socket_set_timeout","socket_get_status","realpath","fnmatch","fsockopen","pfsockopen","pack","unpack","get_browser","crypt","opendir","closedir","chdir","chroot","getcwd","rewinddir","readdir","dir","scandir","glob","fileatime","filectime","filegroup","fileinode","filemtime","fileowner","fileperms","filesize","filetype","file_exists","is_writable","is_writeable","is_readable","is_executable","is_file","is_dir","is_link","stat","lstat","chown","chgrp","lchown","lchgrp","chmod","touch","clearstatcache","disk_total_space","disk_free_space","diskfreespace","realpath_cache_size","realpath_cache_get","mail","ezmlm_hash","openlog","syslog","closelog","lcg_value","metaphone","ob_start","ob_flush","ob_clean","ob_end_flush","ob_end_clean","ob_get_flush","ob_get_clean","ob_get_length","ob_get_level","ob_get_status","ob_get_contents","ob_implicit_flush","ob_list_handlers","ksort","krsort","natsort","natcasesort","asort","arsort","sort","rsort","usort","uasort","uksort","shuffle","array_walk","array_walk_recursive","count","end","prev","next","reset","current","key","min","max","in_array","array_search","extract","compact","array_fill","array_fill_keys","range","array_multisort","array_push","array_pop","array_shift","array_unshift","array_splice","array_slice","array_merge","array_merge_recursive","array_replace","array_replace_recursive","array_keys","array_values","array_count_values","array_column","array_reverse","array_reduce","array_pad","array_flip","array_change_key_case","array_rand","array_unique","array_intersect","array_intersect_key","array_intersect_ukey","array_uintersect","array_intersect_assoc","array_uintersect_assoc","array_intersect_uassoc","array_uintersect_uassoc","array_diff","array_diff_key","array_diff_ukey","array_udiff","array_diff_assoc","array_udiff_assoc","array_diff_uassoc","array_udiff_uassoc","array_sum","array_product","array_filter","array_map","array_chunk","array_combine","array_key_exists","pos","sizeof","key_exists","assert","assert_options","version_compare","ftok","str_rot13","stream_get_filters","stream_filter_register","stream_bucket_make_writeable","stream_bucket_prepend","stream_bucket_append","stream_bucket_new","output_add_rewrite_var","output_reset_rewrite_vars","sys_get_temp_dir","pdo_drivers","jdtogregorian","gregoriantojd","jdtojulian","juliantojd","jdtojewish","jewishtojd","jdtofrench","frenchtojd","jddayofweek","jdmonthname","easter_date","easter_days","unixtojd","jdtounix","cal_to_jd","cal_from_jd","cal_days_in_month","cal_info","ctype_alnum","ctype_alpha","ctype_cntrl","ctype_digit","ctype_lower","ctype_graph","ctype_print","ctype_punct","ctype_space","ctype_upper","ctype_xdigit","curl_init","curl_copy_handle","curl_version","curl_setopt","curl_setopt_array","curl_exec","curl_getinfo","curl_error","curl_errno","curl_close","curl_strerror","curl_multi_strerror","curl_reset","curl_escape","curl_unescape","curl_pause","curl_multi_init","curl_multi_add_handle","curl_multi_remove_handle","curl_multi_select","curl_multi_exec","curl_multi_getcontent","curl_multi_info_read","curl_multi_close","curl_multi_setopt","curl_share_init","curl_share_close","curl_share_setopt","curl_file_create","exif_read_data","read_exif_data","exif_tagname","exif_thumbnail","exif_imagetype","finfo_open","finfo_close","finfo_set_flags","finfo_file","finfo_buffer","mime_content_type","ftp_connect","ftp_ssl_connect","ftp_login","ftp_pwd","ftp_cdup","ftp_chdir","ftp_exec","ftp_raw","ftp_mkdir","ftp_rmdir","ftp_chmod","ftp_alloc","ftp_nlist","ftp_rawlist","ftp_systype","ftp_pasv","ftp_get","ftp_fget","ftp_put","ftp_fput","ftp_size","ftp_mdtm","ftp_rename","ftp_delete","ftp_site","ftp_close","ftp_set_option","ftp_get_option","ftp_nb_fget","ftp_nb_get","ftp_nb_continue","ftp_nb_put","ftp_nb_fput","ftp_quit","textdomain","gettext","_","dgettext","dcgettext","bindtextdomain","ngettext","dngettext","dcngettext","bind_textdomain_codeset","iconv","iconv_get_encoding","iconv_set_encoding","iconv_strlen","iconv_substr","iconv_strpos","iconv_strrpos","iconv_mime_encode","iconv_mime_decode","iconv_mime_decode_headers","json_encode","json_decode","json_last_error","json_last_error_msg","mb_convert_case","mb_strtoupper","mb_strtolower","mb_language","mb_internal_encoding","mb_http_input","mb_http_output","mb_detect_order","mb_substitute_character","mb_parse_str","mb_output_handler","mb_preferred_mime_name","mb_strlen","mb_strpos","mb_strrpos","mb_stripos","mb_strripos","mb_strstr","mb_strrchr","mb_stristr","mb_strrichr","mb_substr_count","mb_substr","mb_strcut","mb_strwidth","mb_strimwidth","mb_convert_encoding","mb_detect_encoding","mb_list_encodings","mb_encoding_aliases","mb_convert_kana","mb_encode_mimeheader","mb_decode_mimeheader","mb_convert_variables","mb_encode_numericentity","mb_decode_numericentity","mb_send_mail","mb_get_info","mb_check_encoding","mb_regex_encoding","mb_regex_set_options","mb_ereg","mb_eregi","mb_ereg_replace","mb_eregi_replace","mb_ereg_replace_callback","mb_split","mb_ereg_match","mb_ereg_search","mb_ereg_search_pos","mb_ereg_search_regs","mb_ereg_search_init","mb_ereg_search_getregs","mb_ereg_search_getpos","mb_ereg_search_setpos","mbregex_encoding","mbereg","mberegi","mbereg_replace","mberegi_replace","mbsplit","mbereg_match","mbereg_search","mbereg_search_pos","mbereg_search_regs","mbereg_search_init","mbereg_search_getregs","mbereg_search_getpos","mbereg_search_setpos","posix_kill","posix_getpid","posix_getppid","posix_getuid","posix_setuid","posix_geteuid","posix_seteuid","posix_getgid","posix_setgid","posix_getegid","posix_setegid","posix_getgroups","posix_getlogin","posix_getpgrp","posix_setsid","posix_setpgid","posix_getpgid","posix_getsid","posix_uname","posix_times","posix_ctermid","posix_ttyname","posix_isatty","posix_getcwd","posix_mkfifo","posix_mknod","posix_access","posix_getgrnam","posix_getgrgid","posix_getpwnam","posix_getpwuid","posix_getrlimit","posix_setrlimit","posix_get_last_error","posix_errno","posix_strerror","posix_initgroups","readline","readline_info","readline_add_history","readline_clear_history","readline_read_history","readline_write_history","readline_completion_function","readline_callback_handler_install","readline_callback_read_char","readline_callback_handler_remove","readline_redisplay","readline_on_new_line","shmop_open","shmop_read","shmop_close","shmop_size","shmop_write","shmop_delete","socket_select","socket_create","socket_create_listen","socket_create_pair","socket_accept","socket_set_nonblock","socket_set_block","socket_listen","socket_close","socket_write","socket_read","socket_getsockname","socket_getpeername","socket_connect","socket_strerror","socket_bind","socket_recv","socket_send","socket_recvfrom","socket_sendto","socket_get_option","socket_set_option","socket_shutdown","socket_last_error","socket_clear_error","socket_import_stream","socket_export_stream","socket_sendmsg","socket_recvmsg","socket_cmsg_space","socket_getopt","socket_setopt","msg_get_queue","msg_send","msg_receive","msg_remove_queue","msg_stat_queue","msg_set_queue","msg_queue_exists","sem_get","sem_acquire","sem_release","sem_remove","shm_attach","shm_remove","shm_detach","shm_put_var","shm_has_var","shm_get_var","shm_remove_var","token_get_all","token_name","opcache_reset","opcache_invalidate","opcache_compile_file","opcache_is_script_cached","opcache_get_configuration","opcache_get_status","dl","cli_set_process_title","cli_get_process_title"]', true));
    }
    public function parse($auth=null)
    {
        $this->parseErrors = array();
        $tokens = token_get_all('<?'.'php '.$this->source.' ?'.'>');
        $vcall = '';
        foreach ($tokens as $token) {
            if (is_array($token)) {
                $id = $token[0];
                switch ($id) {
          case(T_VARIABLE): { $vcall .= 'v'; break; }
          case(T_STRING): { $vcall .= 's'; }
          case(T_REQUIRE_ONCE): case(T_REQUIRE): case(T_NEW): case(T_RETURN):
          case(T_BREAK): case(T_CATCH): case(T_CLONE): case(T_EXIT):
          case(T_PRINT): case(T_GLOBAL): case(T_ECHO): case(T_INCLUDE_ONCE):
          case(T_INCLUDE): case(T_EVAL): case(T_FUNCTION): {
            if (array_search($token[1], $this->allowedCalls) === false) {
                $this->parseErrors[] = 'illegal call: '.$token[1];
            }
          }
        }
            } else {
                $vcall .= $token;
            }
        }
        if (stristr($vcall, 'v(') != '') {
            $this->parseErrors[] = array('illegal dynamic function call');
        }
        return($this->parseErrors);
    }
    public function execute($parameters = array())
    {
        foreach ($parameters as $k => $v) {
            $$k = $v;
        }
        if (sizeof($this->parseErrors) == 0) {
            try {
                eval($this->source.";");
            } catch (Error $e) {
                $q = "Error";
            }
            return isset($q) ? $q : "success !";
        } else {
            print('cannot execute, script contains errors');
        }
    }
}

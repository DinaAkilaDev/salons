<?php

function response_api($status, $statusCode, $message, $data ,$page_number =null,$total_pages  =null,$total_records  =null)
{
    if ($page_number !=null)
        return response()->json(['status' => $status, 'statusCode' => $statusCode, 'message' => $message, 'items' => ['data' =>$data,
            'page_number' =>$page_number, 'total_pages' =>$total_pages, 'total_records' =>$total_records]]);
    else
        return response()->json(['status' => $status, 'statusCode' => $statusCode, 'message' => $message, 'items'=>$data]);
}


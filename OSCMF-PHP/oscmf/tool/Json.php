<?php


namespace oscmf\tool;


use think\Response;

class Json
{
    private $code = 200;

    public function code(int $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param int $status
     * @param string $msg
     * @param array|null $data
     * @return Response
     * @Author: King < 091004081@163.com >
     */
    public function make(int $status, string $msg, ?array $data = null): Response
    {
        $res = compact('status', 'msg');

        if (!is_null($data))
            $res['data'] = $data;

        return Response::create($res, 'json', $this->code);
    }

    /**
     * 成功
     * @param string $msg
     * @param array|null $data
     * @return Response
     * @Author: King < 091004081@163.com >
     */
    public function success($msg = 'ok', ?array $data = null): Response
    {
        if (is_array($msg)) {
            $data = $msg;
            $msg = 'ok';
        }

        return $this->make(200, $msg, $data);
    }

    /**
     * @param mixed ...$args
     * @return Response
     * @Author: King < 091004081@163.com >
     */
    public function successful(...$args): Response
    {
        return $this->success(...$args);
    }

    /**
     * 失败
     * @param string $msg
     * @param array|null $data
     * @return Response
     * @Author: King < 091004081@163.com >
     */
    public function fail($msg = 'fail', ?array $data = null): Response
    {
        if (is_array($msg)) {
            $data = $msg;
            $msg = 'ok';
        }

        return $this->make(400, $msg, $data);
    }

    /**
     * @param $status
     * @param $msg
     * @param array $result
     * @return Response
     * @Author: King < 091004081@163.com >
     */
    public function status($status, $msg, $result = [])
    {
        $status = strtoupper($status);
        if (is_array($msg)) {
            $result = $msg;
            $msg = 'ok';
        }
        return $this->success($msg, compact('status', 'result'));
    }

}
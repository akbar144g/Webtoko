<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Performance implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null) {
        // Logic sebelum request
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        // Logic setelah response
        return $response;
    }
}

?>

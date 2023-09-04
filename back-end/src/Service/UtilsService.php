<?php


namespace App\Service;


use App\Entity\Report;
use App\Entity\Video;
use Doctrine\Persistence\ManagerRegistry;

class UtilsService
{
    public function convertBytes($val , $type_val , $type_wanted){
        $tab_val = array("o", "ko", "Mo", "Go", "To", "Po", "Eo");
        if (!(in_array($type_val, $tab_val) && in_array($type_wanted, $tab_val)))
            return 0;
        $tab = array_flip($tab_val);
        $diff = $tab[$type_val] - $tab[$type_wanted];
        if ($diff > 0)
            return ($val * pow(1024, $diff));
        if ($diff < 0)
            return ($val / pow(1024, -$diff));
        return ($val);
    }

    public function transformJsonBody(\Symfony\Component\HttpFoundation\Request $request)
    {
        $data = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        if ($data === null) {
            return $request;
        }

        $request->request->replace($data);

        return $request;
    }
}

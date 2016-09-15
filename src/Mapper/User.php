<?php

namespace Mwyatt\Possession\Mapper;

class User extends \Mwyatt\Core\AbstractMapper
{


    public function insert(array $data)
    {
        $data['timeCreated'] = time();
        $this->adapter->prepare($this->getInsertGenericSql(['email', 'password', 'timeCreated', 'nameFirst', 'nameLast']));
        $this->adapter->bindParam(':email', $data['email'], $this->adapter->getParamStr());
        $this->adapter->bindParam(':password', $data['password'], $this->adapter->getParamStr());
        $this->adapter->bindParam(':timeCreated', $data['timeCreated'], $this->adapter->getParamInt());
        $this->adapter->execute();
        $data['id'] = $this->adapter->getLastInsertId();
        return $this->getModelLazy($data);
    }


    public function updateById(\Mwyatt\Core\AbstractIterator $models)
    {
        $rowCount = 0;
        $this->adapter->prepare($this->getUpdateGenericSql(['email', 'password', 'nameFirst', 'nameLast']));
        foreach ($models as $model) {
            $this->adapter->bindParam(':email', $model->get('email'), $this->adapter->getParamStr());
            $this->adapter->bindParam(':password', $model->get('password'), $this->adapter->getParamStr());
            $this->adapter->bindParam(':nameFirst', $model->get('nameFirst'), $this->adapter->getParamStr());
            $this->adapter->bindParam(':nameLast', $model->get('nameLast'), $this->adapter->getParamStr());
            $this->adapter->bindParam(":id", $model->get('id'), $this->adapter->getParamInt());
            $this->adapter->execute();
            $rowCount += $this->adapter->getRowCount();
        }
        return $rowCount;
    }
}

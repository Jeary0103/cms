public function edit()
    {
        if(IS_POST)
        {
            if($this->db->update())
            {
                $this->success('更新成功',U('index'));
            }
            else
            {
                $this->error($this->db->getError());
            }
        }
        else
        {
            $data= $this->db->find(Q('id'));
            $data2 = $this->db->getEditData($data['id'],$data['pid']);
            View::with('data',$data)->with('data2',$data2)->make();
        }
    }
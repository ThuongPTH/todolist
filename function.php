<?php

function add_data($username, $password2, $conn)
{
    $password = (string)md5($password2);
    $query = 'insert into user(username, password) values (?, ?)';
    $exec = $conn->prepare($query);
    $exec->bind_param('ss', $username, $password);
    $exec->execute();
    return $exec->affected_rows;
};

function get_username($username, $conn)
{
    $query = 'select * from user where username=?';
    $exec = $conn->prepare($query);
    $exec->bind_param('s', $username);
    $exec->execute();
    $result = $exec->get_result();
    return $result->fetch_array(MYSQLI_ASSOC);
}

function get_list($id, $conn)
{
    $query = 'select * from to_do_list where id=?';
    $exec = $conn->prepare($query);
    $exec->bind_param('i', $id);
    $exec->execute();
    $result = $exec->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function add_list($id, $mission, $conn)
{
    $query = 'insert into to_do_list(id, task) values (?, ?)';
    $exec = $conn->prepare($query);
    $exec->bind_param('is', $id, $mission);
    $exec->execute();
    return $exec->affected_rows;
}

function del_list($stt, $conn)
{
    $query = 'delete from to_do_list where stt=?';
    $exec = $conn->prepare($query);
    $exec->bind_param('i', $stt);
    $exec->execute();
    return $exec->affected_rows;
}

function edit_list($update, $stt, $conn)
{
    $query = 'update to_do_list set task=? WHERE stt=?';
    $exec = $conn->prepare($query);
    $exec->bind_param('si', $update, $stt);
    $exec->execute();
    return $exec->affected_rows;
}

function get_task_by_stt($stt, $conn)
{
    $query = 'select * from to_do_list where stt=?';
    $exec = $conn->prepare($query);
    $exec->bind_param('i', $stt);
    $exec->execute();
    $result = $exec->get_result();
    return $result->fetch_array(MYSQLI_ASSOC);
}

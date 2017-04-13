## **Environment** ##
    Web Server : Apache 2.4.23   
    Language   : PHP 5.6.24  
    Datebase   : Manual implementation (RB-Tree, depend on session)  
    OS         : Ubuntu 14.04  
*\*The server **must** open cookies and session*

## **APIs** ##
- **Get**  
> 1.Get the value according to the specified key .  
>> `http://localhost/get.php?key=[k_name]`  
>> `k_name` : The name of the key you want to query
  
> 2.Get all keys and values  
>> `http://localhost/get.php`  

- **Set**
> 1.Insert / update a key-value pair  
>> `http://localhost/set.php?[k_name]=[v_val]`   
>> `k_name` : The name of the key you want to insert / update  
>> `v_val` : The value of the corresponding key  

> 2.Insert / update several key-value pairs
>> `http://localhost/set.php?[k_name0]=[v_val0]&[k_name1]=[v_val1]&[k_name2]=[v_val2]...`  
>> The meaning of the `k_name` and `v_val` as above.  

*\*All requests are used **HTTP-GET**.*

## **Notice** ##
For data persistence, my idea is to **serialize the entire rb-tree** to a local file each time the rb-tree updated and reload the file in an unexpected crash or reboot, and deserialize the tree to memory.  
Because of the time constraints, the RB-tree only to implement the **insert** and **query**, and didn't implement data persistence, the RB-tree temporarily in the session.  
...  
...  
Ehhhh, ok i admit that my ability to implement is insufficient.  

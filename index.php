<?php

# ������� = � ������ ����� php include �� ������ ���� ����� (����� 500) !!!!!!!!!!
# ������� = ������������ ����������� � HTML  <--### ...   ��� �������� ����� ��� PHP SSI = <--# include 123 -->
# ������� = ������ �������� ���� � �������, ��� ��� ������
# ������� = 
# ������� = 

$pre_html_start_time = microtime(true); # ������ ��� �������

include "project/project_index.php";


echo "<hr>End main index";
?>
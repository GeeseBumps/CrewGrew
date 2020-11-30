# CrewGrew

-db 접속 사항 : db_info.php에서 각자 자신의 데이터베이스 설정 사항으로 비밀번호 변경 바람.<br/>
-db schema 만들기 : crewgrew.sql을 그대로 mysql Workbench에 복붙해서 우선 schema를 생성해준다. 그 후에 data_insert.sql을 복붙해서 테스트를 위한 초기 데이터를 어느정도 입력해줄 수 있도록 한다. 

1. index.php : 처음에 로그인 버튼이 존재하는 화면, 이 화면에 먼저 접속한 후에 로그인을 해야 우리의 서비스를 이용할 수 있음. 여기서 로그인 버튼을 누르면 login.php로 넘어가게 됨. 회원가입 버튼을 누르면 register.php로 넘어가게 됨.
2. mainpage.php : 로그인이 완료되면 이 페이지로 넘어오게 됨, 그 이후에 사용자가 이 페이지에서 무엇을 할 지 선택할 수 있도록 만들어야함.
3. findclub_to_apply.php : 이 페이지에서 동아리를 검색하면 지원서를 작성하는 페이지로 넘어감
4. findclub_applylist.php : 이 페이지에서 동아리를 검색했을 때 로그인한 사람이 해당 동아리의 회장이라면 지원한 사람들의 리스트를 확인할 수 있음.
5. applyform.php : 로그인한 사람이 해당 동아리의 회장이라면 지원서 양식을 등록할 수 있음.

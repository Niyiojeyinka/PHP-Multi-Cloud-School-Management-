<?php
/***
 * Name:        Gettew
 * Package:     Install.php
 * About:        A controller that handle auto table creation operation operation
 * Copyright:  (C) 2018,2019
 * Author:     Ojeyinka Philip Olaniyi
 * License:    closed /propietry
 ***/


class Install extends CI_Controller {
    function index()
    {

    $this->load->database();

$queries = array(
"CREATE TABLE users (
            id int(11) NOT NULL AUTO_INCREMENT,
            firstname varchar(128),
            lastname varchar(128),
            username varchar(128),
            password varchar(128),
            country varchar(128),
             state varchar(128),
            email varchar(128),
            phone varchar(128),
            profile_img varchar(128),
            phonevc varchar(128),
            status varchar(128),
            short_status varchar(128),
            long_status varchar(255),
            time int(20),
            level int(2),
            role varchar(255),
            platform varchar(128),
            school_id varchar(128),
            acct_type varchar(128),
            browser varchar(128),
            lastlog varchar(128),
            PRIMARY KEY (id)
    );",
     "CREATE TABLE blog (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128),
        author varchar(128),
        time int(20) NOT NULL,
        keywords varchar(225),
        subdomain varchar(225),
        description varchar(225),
        staff_id varchar(125),
        img_url varchar(225),
        ref varchar(255),
        status varchar(225),
        text text NOT NULL,
        PRIMARY KEY (id)
);"
//status : published,draft

,"CREATE TABLE chats (
        id int(11) NOT NULL AUTO_INCREMENT,
        sender_id varchar(128) NOT NULL,
         receiver_id varchar(128),
         time int(20),
        receiver_status varchar(128),
        sender_status varchar(128),
        img_link varchar(128),
        type varchar(128),
         text text NOT NULL,
        PRIMARY KEY (id)
);"
//receiver_status options: unread,read
//sender_status options: sent,delivered

 //type options: image,text,imagetext


,
 "CREATE TABLE schools (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128) NOT NULL,
        admin_id varchar(128) NOT NULL,
        student_options text,
        session_division text,
        sessions text,
        term varchar(228),
        phone varchar(228),
        email varchar(228),
        address varchar(228),
        profile_img varchar(128),
        fee_option varchar(128),
        motto varchar(228),
        status varchar(128),
        slug varchar(128),
        account_balance DECIMAL(19,2) NOT NULL,
        pending_balance DECIMAL(19,2) NOT NULL,
        amount_spent DECIMAL(19,2) NOT NULL,
        fee_balance DECIMAL(19,2) NOT NULL,
        total_fee_processed DECIMAL(19,2) NOT NULL,
        show_position varchar(128),
        result_access varchar(128),
        result_access_price DECIMAL(19,2),
       license varchar(128),
       license_expire varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);"
//admin_id are arrays

,"CREATE TABLE posts (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        username varchar(128) NOT NULL,
         slug varchar(128),
         status varchar(128),
        title varchar(128),
        receiver_id varchar(128),
        receiver_type varchar(128),
        post_type varchar(128),
        post_position varchar(128),
        privacy varchar(128),
        post_img varchar(128),
         time int(20),
        contents text,
        PRIMARY KEY (id)
);",
"CREATE TABLE payments (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_id varchar(128) NOT NULL,
        school_id varchar(128) NOT NULL,
        ref varchar(128) NOT NULL,
        method varchar(128) NOT NULL,
        phone varchar(128),
        amount DECIMAL(19,2) NOT NULL,
        status varchar(128),
        email varchar(128),
        product varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);",

//status options: successful,unsuccessful
//methods options: convert, bank


"CREATE TABLE team (
        id int(11) NOT NULL AUTO_INCREMENT,
        firstname varchar(128),
        lastname varchar(128),
        username varchar(128),
        perm varchar(128) ,
        email varchar(128),
        time varchar(128),
        password varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE pages (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        author varchar(128),
        time varchar(128) NOT NULL,
         keywords varchar(225),
        description varchar(225),
        status varchar(225),
        subdomain varchar(225),
        text text NOT NULL,
       PRIMARY KEY (id)
);",
"CREATE TABLE cmessages (
        id int(11) NOT NULL AUTO_INCREMENT,
        email varchar(128),
        name varchar(128),
        phone varchar(128),
        title varchar(128) NOT NULL,
        sender_id varchar(128) NOT NULL,
        username varchar(128),
        message  text NOT NULL,
        status varchar(128),
        solved varchar(128),
        logged_in varchar(128),
        time varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE newsletter (
        id int(11) NOT NULL AUTO_INCREMENT,
        email varchar(128),
        name varchar(128),
        status varchar(128),
        PRIMARY KEY (id)
);",
"CREATE TABLE media (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128),
        time int(20),
        link varchar(128),
        type varchar(128),
        subdomain varchar(128),
        PRIMARY KEY (id)
);"
,
"CREATE TABLE common_tab (
        id int(11) NOT NULL AUTO_INCREMENT,
        position varchar(128),
        short_det varchar(128),
         content text,
        PRIMARY KEY (id)
);",
"CREATE TABLE comments (
        id int(11) NOT NULL AUTO_INCREMENT,
        time varchar(128),
        email varchar(128),
        slug varchar(128),
        status varchar(128),
        img_url varchar(128),
        user_id varchar(128),
        is_reply varchar(128),
        reply_to varchar(128),
        report_status varchar(128),
        content text,
        likes text,
        PRIMARY KEY (id)
);",
//is_reply column is of "true" or "false"

"CREATE TABLE notifications (
        id int(11) NOT NULL AUTO_INCREMENT,
        sender_id varchar(128),
        receiever_id varchar(128),
        slug varchar(128),
        title text(128),
        contents varchar(128),
        type varchar(128),
        status varchar(128),
        time varchar(128),
          PRIMARY KEY (id)
);",
"CREATE TABLE students (
        id int(11) NOT NULL AUTO_INCREMENT,
        firstname varchar(128) NOT NULL,
        lastname varchar(128) NOT NULL,
        middlename varchar(128),
        password varchar(128) NOT NULL,
        student_id varchar(128),
        school_id varchar(128),
        profile_img varchar(128),
        student_options varchar(128),
        gender varchar(228),
        complexion  varchar(128),
        height  varchar(128),
        dob  varchar(128),
        class varchar(128),
        genotype varchar(128),
        blood_group varchar(128),
        lastlog varchar(128),
        parent_id varchar(128),
        admission_date varchar(128),
        student_address varchar(128),
        slug varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);"
,
"CREATE TABLE parents (
        id int(11) NOT NULL AUTO_INCREMENT,
        firstname varchar(128) NOT NULL,
        lastname varchar(128) NOT NULL,
        password varchar(128) NOT NULL,
        middlename varchar(228),
        school_id varchar(128),
        phone varchar(228),
        profile_img varchar(128),
        gender varchar(228),
        complexion  varchar(128),
        lastlog varchar(128),
        admission_date varchar(128),
        child_ids varchar(128),
        address varchar(128),
        slug varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);",
"CREATE TABLE staff (
        id int(11) NOT NULL AUTO_INCREMENT,
        firstname varchar(128) NOT NULL,
        lastname varchar(128) NOT NULL,
        password varchar(128) NOT NULL,
        email varchar(228),
        phone varchar(228),
        role varchar(228),
        dob varchar(228),
        profile_img varchar(128),
        gender varchar(228),
        complexion  varchar(128),
        height  varchar(128),
        staff_type varchar(128),
        staff_id varchar(128),
        school_id  varchar(128),
        lastlog varchar(128),
        slug varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);",
//admin_id are arrays;time:registered time;username in form of mr/mrs lastname
 "CREATE TABLE schools_level (
        id int(11) NOT NULL AUTO_INCREMENT,
        level varchar(128) NOT NULL,
        level_name varchar(128) NOT NULL,
        level_shortname varchar(128) NOT NULL,
        school_id varchar(128) NOT NULL,
                PRIMARY KEY (id)
);",
"CREATE TABLE themes (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128) NOT NULL,
        theme_id varchar(128) NOT NULL,
        theme_version varchar(128) NOT NULL,
        api_version varchar(128) NOT NULL,
        theme_images text NOT NULL,
        creator_id varchar(128) NOT NULL,
        short_desc text NOT NULL,
        description text NOT NULL,
        admin_index varchar(128) NOT NULL,
        status varchar(128) NOT NULL,
        admin_folder varchar(128) NOT NULL,
        asset_folder varchar(128) NOT NULL,
        active_users varchar(128) NOT NULL,
        author_link varchar(128) NOT NULL,
        admin_options text NOT NULL,
        index_page varchar(128) NOT NULL,
        feature_support text NOT NULL,
        tags text NOT NULL,
        time int(20),
        PRIMARY KEY (id)
);",
 "CREATE TABLE websites (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128) NOT NULL,
        tagline varchar(128) NOT NULL,
        domain varchar(128) NOT NULL,
        status varchar(128) NOT NULL,
        subdomain varchar(128) NOT NULL,
        school_id varchar(128) NOT NULL,
        admin_id varchar(128) NOT NULL,
        theme_options text NOT NULL,
        theme_id varchar(128) NOT NULL,
        theme_data text NOT NULL,
        creation_stage varchar(128) NOT NULL,
        favicon varchar(128),
        time int(20),
        PRIMARY KEY (id)
);"
//creation_stage:no to rep stage of 
//creation,theme_data:serve as db for theme functions
,
"CREATE TABLE gettew_blog (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128),
        author varchar(128),
        time int(20) NOT NULL,
        keywords varchar(225),
        description varchar(225),
        img_url varchar(225),
        school_id varchar(225),
        website_id varchar(225),
        status varchar(225),
        text text NOT NULL,
        PRIMARY KEY (id)
);",
"CREATE TABLE results (
        id int(11) NOT NULL AUTO_INCREMENT,
        subject varchar(128) NOT NULL,
        school_id varchar(128),
        student_id varchar(128),
        first_test varchar(225),
        first_test_total varchar(225),
        second_test varchar(225),
        second_test_total varchar(225),
        exam_score varchar(225),
        exam_total varchar(225),
        practical_score varchar(225),
        practical_total varchar(225),
        session varchar(225),
        track_key varchar(225),
        term varchar(225),
        status varchar(225),
        unique_key varchar(225),
        class varchar(128),
        year varchar(128),
        percentage_total DECIMAL(3,1),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);",
"CREATE TABLE result_csv (
        id int(11) NOT NULL AUTO_INCREMENT,
        slug varchar(128) NOT NULL,
        school_id varchar(128),
        status varchar(225),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);","CREATE TABLE subjects (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        school_id varchar(128),
        status varchar(225),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);",
 "CREATE TABLE system_var (
    id int(11) NOT NULL AUTO_INCREMENT,
    variable_name varchar(128),
    variable_value varchar(128),
    long_value text,
    PRIMARY KEY (id)
);",
 "CREATE TABLE students_payment (
        id int(11) NOT NULL AUTO_INCREMENT,
        student_id varchar(128) NOT NULL,
        school_id varchar(128) NOT NULL,
        ref varchar(128) NOT NULL,
        method varchar(128) NOT NULL,
        amount DECIMAL(19,2) NOT NULL,
        status varchar(128),
        term varchar(128),
        session varchar(128),
        level varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);",
"CREATE TABLE gettew_pages (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        author varchar(128),
        time varchar(128) NOT NULL,
         keywords varchar(225),
        description varchar(225),
        status varchar(225),
        subdomain varchar(225),
        text text NOT NULL,
       PRIMARY KEY (id)
);",
 "CREATE TABLE fees (
        id int(11) NOT NULL AUTO_INCREMENT,
        school_id varchar(128) NOT NULL,
        amount DECIMAL(19,2) NOT NULL,
        level varchar(128) NOT NULL,
        term varchar(128) NOT NULL,
        session varchar(128) NOT NULL,
        option varchar(128) NOT NULL,
        fee_title varchar(128),
        time varchar(128) NOT NULL,
       PRIMARY KEY (id)
);"
//school buying from sass = sg
,
"CREATE TABLE sg_transactions (
        id int(11) NOT NULL AUTO_INCREMENT,
        school_id varchar(128) NOT NULL,
        amount DECIMAL(19,2) NOT NULL,
        term varchar(128) NOT NULL,
        session varchar(128) NOT NULL,
        label varchar(128),
        time varchar(128) NOT NULL,
       PRIMARY KEY (id)
);",
"CREATE TABLE sms_history (
        id int(11) NOT NULL AUTO_INCREMENT,
        school_id varchar(128) NOT NULL,
        message varchar(225) NOT NULL,
        receiver varchar(128) NOT NULL,
       message_id varchar(128),

        session varchar(128) NOT NULL,
        term varchar(128) NOT NULL,
        ref varchar(128) NOT NULL,
        status varchar(128),
        time varchar(128) NOT NULL,
       PRIMARY KEY (id)
);",
 "CREATE TABLE payroll (
        id int(11) NOT NULL AUTO_INCREMENT,
        staff_id varchar(128) NOT NULL,
        ref varchar(128) NOT NULL,
        bank_name varchar(128) NOT NULL,
        account_name varchar(128) NOT NULL,
        account_number varchar(128) NOT NULL,
        phone int,
        amount DECIMAL(19,2) NOT NULL,
        status varchar(128),
         email varchar(128),
        time int(20),
        details text,
        PRIMARY KEY (id)
);",
"CREATE TABLE payroll_payments (
        id int(11) NOT NULL AUTO_INCREMENT,
        staff_id varchar(128) NOT NULL,
        ref varchar(128) NOT NULL,
        session varchar(128) NOT NULL,
        month varchar(128) NOT NULL,
        year varchar(128) NOT NULL,
        phone int,
        amount DECIMAL(19,2) NOT NULL,
        status varchar(128),
         year varchar(128),
        time int(20),
        PRIMARY KEY (id)
);"
,
"CREATE TABLE cbt_requests (
        id int(11) NOT NULL AUTO_INCREMENT,
        address text NOT NULL,
        school_id varchar(128) NOT NULL,
        phone varchar(128) NOT NULL,
        plan varchar(128) NOT NULL,
        status varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",
 "CREATE TABLE pending_sms (
        id int(11) NOT NULL AUTO_INCREMENT,
        user_type text NOT NULL,
        user_id varchar(128) NOT NULL,
        staff_id varchar(128) NOT NULL, 
        message text,
        ref varchar(255),
        status varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",
 "CREATE TABLE pending_actions (
        id int(11) NOT NULL AUTO_INCREMENT,
        type text NOT NULL,
        read_status varchar(128) NOT NULL,
        achieve_status text,
        object_ref varchar(128),
        school_id varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",
"CREATE TABLE results_total_score (
        id int(11) NOT NULL AUTO_INCREMENT,
        session varchar(225),
        school_id varchar(123),
        term varchar(225),
        status varchar(225),
        unique_key varchar(225),
        class varchar(128),
        year varchar(128),
        percentage_total DECIMAL(3,1),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);",
"CREATE TABLE results_cards (
        id int(11) NOT NULL AUTO_INCREMENT,
        session varchar(225),
        student_id varchar(123),
        school_id varchar(123), 
        term varchar(225),
        status varchar(225),
        card_no varchar(225),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);",
"CREATE TABLE card_requests (
        id int(11) NOT NULL AUTO_INCREMENT,
        address text NOT NULL,
        school_id varchar(128) NOT NULL,
        phone varchar(128) NOT NULL,
        quantity varchar(128) NOT NULL,
        status varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",
 "CREATE TABLE idcard_requests (
        id int(11) NOT NULL AUTO_INCREMENT,
        address text NOT NULL,
        school_id varchar(128) NOT NULL,
        phone varchar(128) NOT NULL,
        quantity varchar(128) NOT NULL,
        type varchar(128),
        status varchar(128),
        time int(20),
        PRIMARY KEY (id)
);",
 "CREATE TABLE events (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        location varchar(128),
        duration varchar(128),
        event_time varchar(128),
        author varchar(128),
        subdomain varchar(128),
        staff_id varchar(125),
        school_id varchar(225),
        ref varchar(255),
        status varchar(225),
        text text NOT NULL,
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);",
 "CREATE TABLE sliders (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        slug varchar(128),
        author varchar(128),
        subdomain varchar(128),
        staff_id varchar(125),
        school_id varchar(225),
        ref varchar(255),
        status varchar(225),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);",
"CREATE TABLE packages (
        id int(11) NOT NULL AUTO_INCREMENT,
        title varchar(128) NOT NULL,
        normal_price DECIMAL(19,2) NOT NULL,
        promo_price DECIMAL(19,2) NOT NULL,
        status varchar(25),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);",
"CREATE TABLE subscriptions (
        id int(11) NOT NULL AUTO_INCREMENT,
        package_id varchar(128) NOT NULL,
        school_id varchar(128) NOT NULL,
        status varchar(225),
        time int(20) NOT NULL,
        PRIMARY KEY (id)
);"
);


$count = 0;
 foreach($queries as $value)
 {
    $count++;
  if ($this->db->query($value))
  {

  echo "Query  ".$count." executed successfully<br>";

  }
  }
}


}

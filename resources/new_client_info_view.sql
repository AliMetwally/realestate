create view v_user_client_2 as
select d.client_id,
		d.deal_id,
        d.current_sales as user_id,
        concat(c.first_name, ' ', c.second_name) AS client_name,
        c.client_phone,
        (case c.client_status
            when 1 then 'عميل جديد'
            when 2 then 'عميل حالي'
            when 3 then 'عميل مشترك'
        end) AS client_status_name,
        c.client_status,
        d.created_date as deal_created_date,
        -- remove property name
        SF_GET_PROPERTY_NAME(d.property_id) AS property_name,
        u.username,
        c.client_flag,
        c.close_client,
        t.status_name
from deals d join client c
on d.client_id = c.client_id 
join user u on u.user_id = d.current_sales
join lkp_deal_status t on d.deal_status = t.deal_status
;
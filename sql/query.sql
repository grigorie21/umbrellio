SELECT group_small AS minim_id, group_id, COUNT(id) AS count
FROM (select *,
        CASE
            WHEN LEAD(group_id,1,NULL) OVER(PARTITION BY group_id ORDER BY id) = group_id
            THEN MIN(id) OVER(PARTITION BY group_id ORDER BY id)
            ELSE id
        END group_small
        FROM userstest
        ORDER BY id) t1
GROUP BY group_small, group_id
ORDER BY minim_id;
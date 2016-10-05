How to use this to export/import your site:

## Exporting the Categories
- Import your EE .sql file into your local PHPMYAdmin
- Run this SQL command
    ```` SQL
    select cat_id, cat_name from exp_categories
    ````

- Under Query Result Operations, click on Export
- Select JSON as the format
- Copy code into categories.json minus the comments, the file should only contain the actual JSON object

## Exporting the content
- Run this SQL command
```` SQL
SELECT 
    distinct a.entry_id "ID",
    (select x.cat_name from exp_category_posts as z left join exp_categories as x on z.cat_id = x.cat_id where z.entry_id = a.entry_id limit 1) 'cat_name',
    a.title,
    a.url_title,
    a.entry_date,
    b.field_id_9 "exerpt",
    b.field_id_10 "content"    
from exp_channel_titles as a
left join exp_channel_data as b on a.entry_id = b.entry_id
where a.channel_id = 1 and a.status = "open"
```` 
- Under Query Result Operations, click on Export
- Select JSON ad the format
- Copy code into data.json minus the comments, the file should only contain the actual JSON object

## Importing the data into WordPress
1. Upload and activate the plugin
2. Go to EE Import in the dashboard and hit the Do Import button
3. Profit
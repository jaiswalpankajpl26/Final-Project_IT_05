package healthcenter.mnnit.pj.care4u;

import android.app.ListActivity;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.widget.ListAdapter;
import android.widget.SimpleAdapter;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class show_history extends ListActivity {


    String jason_string;
    JSONArray jasonarray = null;
    JSONObject jasonobject;
    ArrayList<HashMap<String, String>> contactList;
    Context ctx;
    public show_history()
    {

    }
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        jason_string = getIntent().getExtras().getString("jason_data");
        setContentView(R.layout.activity_show_history);
       // final ListView lv1 = getListView();

        contactList = new ArrayList<HashMap<String, String>>();
        // Listview on item click listener
        list() ;

    }


    public void list(){
        try {
//            Toast.makeText(ctx, jason_string, Toast.LENGTH_LONG).show();
            jasonobject = new JSONObject(jason_string);
            jasonarray = jasonobject.getJSONArray("result");

            int count = 0;
            String name, ap_time, ap_date,special;
            while (count < jasonarray.length()) {
                JSONObject JO = jasonarray.getJSONObject(count);
                name = JO.getString("drname");
                ap_date = JO.getString("ap_date");
               //ap_time= JO.getString("ap_time");
                special=JO.getString("special");

                HashMap<String, String> contact = new HashMap<String, String>();
                contact.put("ap_date", ap_date);
                contact.put("name", name);
              //  contact.put("ap_time", ap_time);
                contact.put("special",special);
                count++;
                contactList.add(contact);

            }

        } catch (JSONException e) {
           // Toast.makeText(ctx,e., Toast.LENGTH_LONG).show();
            e.printStackTrace();
        }
        add();}

        public void onBackPressed()
        {
            Intent intent = new Intent(this, initial.class);
            finish(); // to simulate "restart" of the activity.
            intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
            startActivity(intent);

        }




    public void add(){
        ListAdapter adapter = new SimpleAdapter(
                show_history.this, contactList,
                R.layout.row_history, new String[] {"name",
                "ap_date","special" }, new int[] { R.id.txt_name,
                R.id.txt_date, R.id.txt_time});
        setListAdapter(adapter);
    }
}

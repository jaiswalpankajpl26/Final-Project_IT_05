package healthcenter.mnnit.pj.care4u;

import android.app.ListActivity;
import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class display_chart extends ListActivity {


    String jason_string,sel_date,special;
    JSONArray jasonarray = null;
    JSONObject jasonobject;
    ArrayList<HashMap<String, String>> contactList;
    Context ctx;
    public display_chart()
    {
    }
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        jason_string = getIntent().getExtras().getString("jason_data");
        sel_date=getIntent().getExtras().getString("sel_date");
        special=getIntent().getExtras().getString("special");
        // Toast.makeText(this, jason_string, Toast.LENGTH_LONG).show();
        setContentView(R.layout.activity_display_chart);
        final ListView lv = getListView();

        contactList = new ArrayList<HashMap<String, String>>();


        // Listview on item click listener
        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view,
                                    int position, long id) {
                // getting values from selected ListItem
//                Toast.makeText(ctx, sel_date, Toast.LENGTH_LONG).show();

                // PopupMenu popup = new PopupMenu(this, lv);
                String idx = ((TextView) view.findViewById(R.id.txt_id))
                        .getText().toString();
                String name = ((TextView) view.findViewById(R.id.txt_name))
                        .getText().toString();
                String special = ((TextView) view.findViewById(R.id.txt_special))
                        .getText().toString();
                String time = ((TextView) view.findViewById(R.id.txt_time))
                        .getText().toString();

                ConnectivityManager connMgr = (ConnectivityManager)
                        getSystemService(Context.CONNECTIVITY_SERVICE);
                NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
                if (networkInfo != null && networkInfo.isConnected()) {
                    //calling back_ground task.
                    //String m="login";
                    //Toast.makeText(getApplicationContext(),idx+" "+sel_date, Toast.LENGTH_LONG).show();


                    bg_appoint backgroundTask = new bg_appoint(display_chart.this,display_chart.this);
                    backgroundTask.execute(idx,sel_date,name,time,special);
                    //  Intent intent = new Intent(getApplicationContext(),initial.class);
                    //intent.putExtra("t_id",idx);
                    //intent.putExtra("sel_date",sel_date);
                    //startActivity(intent);
                }
                else {
                    Toast.makeText(ctx, " No Internet Connection ", Toast.LENGTH_LONG).show();
                }

            }
        });
        list() ;

    }


    public void list(){
        try {
            jasonobject = new JSONObject(jason_string);
            jasonarray = jasonobject.getJSONArray("result");

            int count = 0;
            String name, id, time, special;
            while (count < jasonarray.length()) {
                JSONObject JO = jasonarray.getJSONObject(count);
                name = JO.getString("name");
                id = JO.getString("id");
                time = JO.getString("time");
                special = JO.getString("specialization");

                HashMap<String, String> contact = new HashMap<String, String>();
                contact.put("id", id);
                contact.put("name", name);
                contact.put("time", time);
                contact.put("special", special);
                count++;
                contactList.add(contact);

            }

        } catch (JSONException e) {
            e.printStackTrace();
        }
        add();
    }

    public void add(){
        ListAdapter adapter = new SimpleAdapter(
                display_chart.this, contactList,
                R.layout.row_layout, new String[] {"id", "name",
                "time","special" }, new int[] { R.id.txt_id,
                R.id.txt_name, R.id.txt_time,R.id.txt_special });
        setListAdapter(adapter);
    }
}

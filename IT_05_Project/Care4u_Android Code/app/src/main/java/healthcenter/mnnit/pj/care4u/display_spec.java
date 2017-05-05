package healthcenter.mnnit.pj.care4u;

import android.app.ListActivity;
import android.content.Context;
import android.content.DialogInterface;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class display_spec extends ListActivity {


    String jason_string,select_date,select_day;
    JSONArray jasonarray = null;
    JSONObject jasonobject;
    ArrayList<HashMap<String, String>> contactList;
    Context ctx;
    public display_spec()
    {
    }
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        jason_string = getIntent().getExtras().getString("jason_data");
        select_date=getIntent().getExtras().getString("sel_date");
        select_day=getIntent().getExtras().getString("sel_day");
        // Toast.makeText(this, jason_string, Toast.LENGTH_LONG).show();
        setContentView(R.layout.activity_display_spec);
        final ListView lv = getListView();

        contactList = new ArrayList<HashMap<String, String>>();

        //  Toast.makeText(ctx,  sel_date+sel_day+jason_string, Toast.LENGTH_LONG).show();

        // Listview on item click listener
        lv.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view,
                                    int position, long id) {

                String special = ((TextView) view.findViewById(R.id.txt_spec))
                        .getText().toString();

                //  Toast.makeText(ctx,sel_date+" "+sel_day+" "+special, Toast.LENGTH_LONG).show();
                ConnectivityManager connMgr = (ConnectivityManager)
                        getSystemService(Context.CONNECTIVITY_SERVICE);
                NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
                if (networkInfo != null && networkInfo.isConnected()) {
                    bg_after_plogin backgroundTask = new bg_after_plogin(display_spec.this,display_spec.this);
                    backgroundTask.execute(select_date,select_day,special);
                }
                else {
                   // Toast.makeText(ctx, " No Internet Connection ", Toast.LENGTH_LONG).show();
                    AlertDialog.Builder builder = new AlertDialog.Builder(display_spec.this);
                    builder.setMessage("No Internet Connection...!!!")
                            .setCancelable(false)
                            .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                                public void onClick(DialogInterface dialog, int id) {

                                }
                            });

                    AlertDialog alert = builder.create();
                    alert.show();
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
            String special;
            while (count < jasonarray.length()) {
                JSONObject JO = jasonarray.getJSONObject(count);

                special = JO.getString("specialization");
                //special = JO.getString("option.name");

                HashMap<String, String> contact = new HashMap<String, String>();

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
                display_spec.this, contactList,
                R.layout.row_spec, new String[] {"special" }, new int[] { R.id.txt_spec});
        setListAdapter(adapter);
    }
}

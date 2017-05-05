package healthcenter.mnnit.pj.care4u;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.net.Uri;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.Toast;

import com.google.android.gms.appindexing.Action;
import com.google.android.gms.appindexing.AppIndex;
import com.google.android.gms.common.api.GoogleApiClient;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class med_MainActivity extends AppCompatActivity implements AsyncResponse {
    AutoCompleteTextView medic;
    String jason_string;

    connection backgroundtask;
    Button checking;

    Context ctx;

    ArrayList<String> medicines = new ArrayList<String>();
    String med = new String();
    /**
     * ATTENTION: This was auto-generated to implement the App Indexing API.
     * See https://g.co/AppIndexing/AndroidStudio for more information.
     */
    private GoogleApiClient client;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.med_activity_main);
        medic = (AutoCompleteTextView) findViewById(R.id.medicine);
        checking = (Button) findViewById(R.id.checkstat);

        ConnectivityManager connMgr = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected()) {

            backgroundtask = new connection(this);
            backgroundtask.delegate = this;
            backgroundtask.execute();

        } else {
           // Toast.makeText(ctx, "No Connection", Toast.LENGTH_LONG).show();
            AlertDialog.Builder builder = new AlertDialog.Builder(med_MainActivity.this);
            builder.setMessage("No Internet Connection...!!!")
                    .setCancelable(false)
                    .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {

                        }
                    });

            AlertDialog alert = builder.create();
            alert.show();
        }

        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();
    }

    public void setChecking(View view) {
        //Toast.makeText(MainActivity.this, med, Toast.LENGTH_SHORT).show();
        if(med!="") {
            extract task2 = new extract(this);
            task2.execute(med);
        }
        else
        {
            Toast.makeText(this, "Give medicine name!!!", Toast.LENGTH_LONG).show();
        }
        //task2.execute(med);

    }

    //}
    @Override
    public void processFinish(String output) {

        String name = "";
        int count = 0;
        // Toast.makeText(this,output,Toast.LENGTH_LONG).show();
        try {

                JSONArray jasonarray = new JSONArray(output);


            while (count < jasonarray.length()) {
                JSONObject JO = jasonarray.getJSONObject(count);
                name = JO.getString("name");
                //  Toast.makeText(this,name,Toast.LENGTH_LONG).show();
                medicines.add(name);
                count++;
            }
        } catch (JSONException e) {
            //Toast.makeText(this, String.valueOf(count), Toast.LENGTH_LONG).show();
            System.out.print(e);
        }


       // Toast.makeText(this,String.valueOf(count),Toast.LENGTH_LONG).show();
//code change on date 12-11-2016
        if(count==0)
        {
            AlertDialog.Builder builder = new AlertDialog.Builder(med_MainActivity.this);
            builder.setMessage("No/Weak Internet Connection...Please search again!!!")
                    .setCancelable(false)
                    .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {

                            Intent i = new Intent(med_MainActivity.this, initial.class);
                            i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                            startActivity(i);

                        }
                    });

            AlertDialog alert = builder.create();
            alert.show();

        }
else {


            ArrayAdapter<String> adapter = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, medicines);
            medic.setThreshold(1);
            medic.setAdapter(adapter);
            medic.setOnItemClickListener(new AdapterView.OnItemClickListener() {

                @Override
                public void onItemClick(AdapterView<?> arg0, View arg1, int position,
                                        long arg3) {
                    med = medic.getText().toString();


                    //s1.get(position) is name selected from autocompletetextview
                    // now you can show the value on textview.
                }
            });
        }
      //  Toast.makeText(this, med+"Medicine name", Toast.LENGTH_LONG).show();
        //med=medicines.getText().toString();

        //medicine.setOnItemSelectedListener((AdapterView.OnItemSelectedListener) this);
        //medicine.setOnItemClickListener(this);

        //Toast.makeText(this,output,Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onStart() {
        super.onStart();

        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        client.connect();
        Action viewAction = Action.newAction(
                Action.TYPE_VIEW, // TODO: choose an action type.
                "med_Main Page", // TODO: Define a title for the content shown.
                // TODO: If you have web page content that matches this app activity's content,
                // make sure this auto-generated web page URL is correct.
                // Otherwise, set the URL to null.
                Uri.parse("http://host/path"),
                // TODO: Make sure this auto-generated app deep link URI is correct.
                Uri.parse("android-app://healthcenter.mnnit.pj.care4u/http/host/path")
        );
        AppIndex.AppIndexApi.start(client, viewAction);
    }

    @Override
    public void onStop() {
        super.onStop();

        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        Action viewAction = Action.newAction(
                Action.TYPE_VIEW, // TODO: choose an action type.
                "med_Main Page", // TODO: Define a title for the content shown.
                // TODO: If you have web page content that matches this app activity's content,
                // make sure this auto-generated web page URL is correct.
                // Otherwise, set the URL to null.
                Uri.parse("http://host/path"),
                // TODO: Make sure this auto-generated app deep link URI is correct.
                Uri.parse("android-app://healthcenter.mnnit.pj.care4u/http/host/path")
        );
        AppIndex.AppIndexApi.end(client, viewAction);
        client.disconnect();
    }
}

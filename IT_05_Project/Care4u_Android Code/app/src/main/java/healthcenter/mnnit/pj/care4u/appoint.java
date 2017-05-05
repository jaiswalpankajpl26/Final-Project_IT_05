package healthcenter.mnnit.pj.care4u;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

public class appoint extends AppCompatActivity {

    EditText regno;
    String dname, sel_date, dtime, special;
    String task;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_appoint);

        dname = getIntent().getExtras().getString("dname");
        sel_date = getIntent().getExtras().getString("sel_date");
        dtime = getIntent().getExtras().getString("dtime");
        special = getIntent().getExtras().getString("special");
        TextView drname = (TextView) findViewById(R.id.drname);
        drname.setText(dname);
        TextView date = (TextView) findViewById(R.id.date);
        date.setText(sel_date);
        TextView time = (TextView) findViewById(R.id.time);
        time.setText(dtime);
        regno = (EditText) findViewById(R.id.regno);
        // Toast.makeText(this, dname, Toast.LENGTH_SHORT).show();
    }

    public void finalappoint(View view) {
        String regnostr = regno.getText().toString();
        task="appoint";
        if (regnostr.matches("")) {   // isme database doctor ka dalna h compulsoroly
            Toast.makeText(this, "Data Incomplete", Toast.LENGTH_SHORT).show();
            return;
        }

        ConnectivityManager connMgr = (ConnectivityManager)
                getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected()) {
            //calling back_ground task.
            //String m="login";
            //Toast.makeText(getApplicationContext(),idx+" "+sel_date, Toast.LENGTH_LONG).show();
            bg_finalappoint backgroundTask = new bg_finalappoint(this);
            backgroundTask.execute(dname,sel_date,dtime,regnostr,task,special);
        }
    }
    public void cancel(View view) {
        String regnostr = regno.getText().toString();
        task="cancel";
        if (regnostr.matches("")) {   // isme database doctor ka dalna h compulsoroly
            Toast.makeText(this, "Data Incomplete", Toast.LENGTH_SHORT).show();
            return;
        }

        ConnectivityManager connMgr = (ConnectivityManager)
                getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected()) {
            //calling back_ground task.
            //String m="login";
            //Toast.makeText(getApplicationContext(),idx+" "+sel_date, Toast.LENGTH_LONG).show();
            bg_finalappoint backgroundTask = new bg_finalappoint(this);
            backgroundTask.execute(dname,sel_date,dtime,regnostr,task,special);
        }
    }
}

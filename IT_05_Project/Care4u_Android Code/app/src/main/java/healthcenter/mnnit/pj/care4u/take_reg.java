package healthcenter.mnnit.pj.care4u;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

public class take_reg extends AppCompatActivity {
    EditText regno;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_take_reg);

        regno = (EditText) findViewById(R.id.regno);
        // Toast.makeText(this, dname, Toast.LENGTH_SHORT).show();
    }

    public void input_reg(View view) {
        String regnostr = regno.getText().toString();

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
            bg_history backgroundTask = new bg_history(take_reg.this,take_reg.this);
            backgroundTask.execute(regnostr);
        }
        else {
            AlertDialog.Builder builder = new AlertDialog.Builder(take_reg.this);
            builder.setMessage("NO INTERNET CONNECTION...!!!")
                    .setCancelable(false)
                    .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {

                        }
                    });
            AlertDialog alert = builder.create();
            alert.show();
        }
    }
}

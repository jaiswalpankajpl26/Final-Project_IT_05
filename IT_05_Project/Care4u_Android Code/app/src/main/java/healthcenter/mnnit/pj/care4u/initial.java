package healthcenter.mnnit.pj.care4u;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;

import java.lang.reflect.Modifier;
import java.net.URL;
import java.net.URLConnection;

public class initial extends AppCompatActivity {

    String url1 = "http://hc.mnnit.ac.in/care4u";
    ImageView appoint,med;
    @Override


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_initial);

        /*
        //action bar 1
        android.support.v7.app.ActionBar actionBar=getSupportActionBar();
        actionBar.setLogo(R.drawable.ic_launcher);
        actionBar.setDisplayUseLogoEnabled(true);
        actionBar.setDisplayShowHomeEnabled(true);

        //end

*/


     


        appoint=(ImageView)findViewById(R.id.img_appo);
        med=(ImageView)findViewById(R.id.img_med);

        appoint.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {
                Intent a = new Intent(initial.this, after_plogin.class);
                startActivity(a);
            }
        });


        //new work





        med.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ConnectivityManager connMgr = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
                NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
                if (networkInfo != null && networkInfo.isConnected()) {

                    Intent b = new Intent(initial.this,med_MainActivity.class);
                    startActivity(b);

                }
                else {
                    AlertDialog.Builder builder = new AlertDialog.Builder(initial.this);
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
        });
    }

    public boolean isConnectedToServer(String url, int timeout) {
        try{
            URL myUrl = new URL(url);
            URLConnection connection = myUrl.openConnection();
            connection.setConnectTimeout(timeout);
            connection.connect();
            return true;
        } catch (Exception e) {
            // Handle your exceptions
            return false;
        }
    }

    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case R.id.about:
                // User chose the "Settings" item, show the app settings UI...
                // Toast.makeText(this, "Menu item 1 selected", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(this,about.class);
                startActivity(intent);
                return true;

            case R.id.developer:
                // User chose the "Favorite" action, mark the current item
                // as a favorite...
                // Toast.makeText(this, "Menu Item 2 selected", Toast.LENGTH_SHORT).show();
                Intent inten = new Intent(this,developer.class);
                startActivity(inten);
                return true;

          //  case R.id.feedback:
                // User chose the "Favorite" action, mark the current item
                // as a favorite...
                // Toast.makeText(this, "Menu Item 2 selected", Toast.LENGTH_SHORT).show();
               // Intent inte = new Intent(this,feedback.class);
               // startActivity(inte);
               // return true;


            default:
                // If we got here, the user's action was not recognized.
                // Invoke the superclass to handle it.
                return super.onOptionsItemSelected(item);

        }
    }


}


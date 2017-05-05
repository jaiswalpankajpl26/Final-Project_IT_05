package healthcenter.mnnit.pj.care4u;

import android.app.DatePickerDialog;
import android.app.Dialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.DatePicker;
import android.widget.TextView;
import android.widget.Toast;

import java.net.HttpURLConnection;
import java.net.URL;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class after_plogin extends AppCompatActivity {

    // String url1 = "http://hc.mnnit.ac.in/care4u/chart.php";
    private DatePicker datePicker;
    private Calendar calendar;
    private TextView dateView;
    private int year, month, day,mo;
    private String days;
    String selected_day,d,m,y;
    String user_name;
    String d1="";
    Date dt1,dt2;
    String current_date="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_after_plogin);

        dateView = (TextView) findViewById(R.id.textView3);
        calendar = Calendar.getInstance();
        year = calendar.get(Calendar.YEAR);

        month = calendar.get(Calendar.MONTH);
        mo=month+1;
        day = calendar.get(Calendar.DAY_OF_MONTH);
        current_date=year+"/"+mo+"/"+day;

        SimpleDateFormat format2=new SimpleDateFormat("yyyy/MM/dd");
        try {
            dt2=format2.parse(current_date);
        } catch (ParseException e) {
            e.printStackTrace();
        }

        try {
            showDate(year, month+1, day);
        } catch (ParseException e) {
            e.printStackTrace();
        }
    }

    @SuppressWarnings("deprecation")
    public void setDate(View view) {
        showDialog(999);
    }

    @Override
    protected Dialog onCreateDialog(int id) {
        // TODO Auto-generated method stub
        if (id == 999) {
            return new DatePickerDialog(this, myDateListener, year, month, day);
        }
        return null;
    }

    private DatePickerDialog.OnDateSetListener myDateListener = new DatePickerDialog.OnDateSetListener() {
        @Override
        public void onDateSet(DatePicker arg0, int arg1, int arg2, int arg3) {
            // TODO Auto-generated method stub
            // arg1 = year
            // arg2 = month
            //arg3 = day;
            try {
                showDate(arg1, arg2+1, arg3);
            } catch (ParseException e) {
                e.printStackTrace();
            }
        }
    };

    private void showDate(int year, int month, int day) throws ParseException {
        //updated date :u can select year , month,day...
        // dateView.setText(new StringBuilder().append(day).append("/")
        //  .append(month).append("/").append(year));
        String a = "";
        d=Integer.toString(day);
        m=Integer.toString(month);
        y=Integer.toString(year);
        a=a+y+"/"+m+"/"+d;

        SimpleDateFormat format1=new SimpleDateFormat("yyyy/MM/dd");
        dt1=format1.parse(a);
        DateFormat format2=new SimpleDateFormat("EEEE");
        selected_day=format2.format(dt1).toUpperCase().substring(0, 3);
        dateView.setText(selected_day+","+a);
        d1=a;
    }

    //new
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
              //  return true;


            default:
                // If we got here, the user's action was not recognized.
                // Invoke the superclass to handle it.
                return super.onOptionsItemSelected(item);

        }
    }



    public void showhistory(View view)
    {
        Intent intent = new Intent(this,take_reg.class);
        startActivity(intent);
    }






    public void showchart(View view)
    {
//to cheq internet connection......
        ConnectivityManager connMgr = (ConnectivityManager)
                getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        //Toast.makeText(this, dt1+"and"+dt2, Toast.LENGTH_LONG).show();

        if(dt1.before(dt2))
        {
            Toast.makeText(this, "invalid dates", Toast.LENGTH_LONG).show();
        }

        else
        if (networkInfo != null && networkInfo.isConnected()) {
            //calling back_ground task.

            bg_specialisation backgroundTask=new bg_specialisation(after_plogin.this,after_plogin.this);
            backgroundTask.execute(selected_day, d1);
            ////////////////////////////////////////////////////

            //////////////////////////////////////
        }
        else {
            //Toast.makeText(this, " No Internet Connection ", Toast.LENGTH_LONG).show();

            AlertDialog.Builder builder = new AlertDialog.Builder(after_plogin.this);
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

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    public boolean isConnectedToServer(String url, int timeout) {
        try {
            HttpURLConnection.setFollowRedirects(false);
            HttpURLConnection con = (HttpURLConnection) new URL(url).openConnection();
            con.setConnectTimeout(timeout);
            con.setReadTimeout(timeout);
            con.setRequestMethod("HEAD");
            return (con.getResponseCode() == HttpURLConnection.HTTP_OK);
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
    }
}

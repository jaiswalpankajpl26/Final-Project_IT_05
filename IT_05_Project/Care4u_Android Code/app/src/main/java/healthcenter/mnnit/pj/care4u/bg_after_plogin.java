package healthcenter.mnnit.pj.care4u;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLEncoder;

/**
 * Created by alok saxena on 01-03-2016.
 */



public class bg_after_plogin extends AsyncTask<String,Void,String> {


    public static final String KEY_ID = "id";
    public static final String KEY_NAME = "name";
    public static final String KEY_TIME = "time";
    public static final String JSON_ARRAY = "result";

    String selected_date,selected_day,special;
    private ProgressDialog dialog;

    Context ctx;
    bg_after_plogin(display_spec activity,Context ctx2)
    {
        dialog= new ProgressDialog(activity);
        this.ctx =ctx2;
    }
    @Override
    protected void onPreExecute() {
        super.onPreExecute();
        dialog.setMessage("Loading ,Please wait...");
        dialog.show();
    }
    @Override
    protected String doInBackground(String... params) {
        String login_url = "http://hc.mnnit.ac.in/care4u/chart.php";
       // String login_url="http://210.212.49.25/care4u/chart.php";
        selected_date= params[0];
        selected_day=params[1];
        special=params[2];

        try {
            URL url = new URL(login_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection)url.openConnection();

            httpURLConnection.setReadTimeout(15000);
            httpURLConnection.setConnectTimeout(15000);

            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream,"UTF-8"));

            String data = URLEncoder.encode("selected_day","UTF-8")+"="+URLEncoder.encode(selected_day,"UTF-8")+"&"+
                    URLEncoder.encode("selected_date","UTF-8")+"="+URLEncoder.encode(selected_date,"UTF-8")+"&"+
                    URLEncoder.encode("special","UTF-8")+"="+URLEncoder.encode(special,"UTF-8");
            bufferedWriter.write(data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream,"iso-8859-1"));
            //String response = "";
            String line;
            StringBuilder res=new StringBuilder();
            while ((line = bufferedReader.readLine()) != null) {
                res.append(line + "\n");
            }
            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            return res.toString().trim();
            // return  "poo";
        } catch (MalformedURLException e) {
            return "wrong";
        } catch (IOException e) {
            return "wrong";
        }

    }
    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);
    }
    @Override
    protected void onPostExecute(String result) {
        if (dialog.isShowing())
            dialog.dismiss();
        if (result.matches("wrong")) {
            Toast.makeText(ctx, "Server problem!!!", Toast.LENGTH_LONG).show();
            return;
        }
        //  Toast.makeText(ctx,s,Toast.LENGTH_LONG).show();

        // Toast.makeText(ctx, result, Toast.LENGTH_LONG).show();
        //       Toast.makeText(ctx,result, Toast.LENGTH_LONG).show();
        else {
            Intent intent = new Intent(ctx, display_chart.class);
            intent.putExtra("jason_data", result);
            intent.putExtra("sel_date", selected_date);
            intent.putExtra("special", special);
            //    Toast.makeText(ctx,selected_day+" "+selected_date+" "+special, Toast.LENGTH_LONG).show();
            ctx.startActivity(intent);
        }
    }
}

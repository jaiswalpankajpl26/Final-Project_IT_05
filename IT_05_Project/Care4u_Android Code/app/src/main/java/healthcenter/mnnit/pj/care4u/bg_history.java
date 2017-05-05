package healthcenter.mnnit.pj.care4u;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;

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
 * Created by SULAV KUMAR SAHA on 11-03-2016.
 */
public class bg_history extends AsyncTask<String,Void,String> {



    String login_url = "";

    public Context ctx2;
    private ProgressDialog dialog;

    public bg_history(take_reg activity, Context ctx2) {
        dialog = new ProgressDialog(activity);
        this.ctx2 = ctx2;
    }
    //public bg_appoint(Context ctx2){
    //  this.ctx2=ctx2;
    // dialog =new ProgressDialog(ctx2);
    //}+

    @Override
    protected void onPreExecute() {
        super.onPreExecute();
        dialog.setMessage("Loading, please wait...");
        dialog.show();
    }

    @Override
    protected String doInBackground(String... params) {
        login_url = "http://hc.mnnit.ac.in/care4u/patnt_history.php";
     // login_url = "http://210.212.49.25/care4u/patnt_history.php";
        String regno = params[0];

        try {
            URL url = new URL(login_url);
            HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
            httpURLConnection.setReadTimeout(15000);
            httpURLConnection.setConnectTimeout(1500);
            httpURLConnection.setRequestMethod("POST");
            httpURLConnection.setDoOutput(true);
            httpURLConnection.setDoInput(true);
            OutputStream outputStream = httpURLConnection.getOutputStream();
            BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream, "UTF-8"));
            String data = URLEncoder.encode("reg", "UTF-8") + "=" + URLEncoder.encode(regno, "UTF-8");
            bufferedWriter.write(data);
            bufferedWriter.flush();
            bufferedWriter.close();
            outputStream.close();
            InputStream inputStream = httpURLConnection.getInputStream();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream, "iso-8859-1"));
            //String response = "";
            String line;
            StringBuilder res = new StringBuilder();
            while ((line = bufferedReader.readLine()) != null) {
                res.append(line + "\n");
            }
            bufferedReader.close();
            inputStream.close();
            httpURLConnection.disconnect();
            return res.toString().trim();
        } catch (MalformedURLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

        return null;
    }

    @Override
    protected void onProgressUpdate(Void... values) {
        super.onProgressUpdate(values);


    }

    @Override
    protected void onPostExecute(String result) {

        if (dialog.isShowing()) {
            dialog.dismiss();

        }
     //   Toast.makeText(ctx2, result, Toast.LENGTH_SHORT).show();
        if (result.matches("blank")) {
            //Toast.makeText(ctx2, "No history available", Toast.LENGTH_LONG).show();

            AlertDialog.Builder builder = new AlertDialog.Builder(ctx2);
            builder.setMessage("NO HISTORY AVAILABLE OR WRONG CARD NUMBER!")
                    .setCancelable(false)
                    .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                        public void onClick(DialogInterface dialog, int id) {

                        }
        });
        AlertDialog alert = builder.create();
        alert.show();
                        }
        else

                        {
                            Intent intent = new Intent(ctx2, show_history.class);
                            intent.putExtra("jason_data", result);
                            ctx2.startActivity(intent);
                        }
                    }
        }

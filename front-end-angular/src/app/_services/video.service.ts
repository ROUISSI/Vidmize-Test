import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

import { environment } from '@environments/environment';

@Injectable({ providedIn: 'root' })
export class VideoService {

    constructor(private http: HttpClient) { }

    allVideos() {
        return this.http.get<any>(`${environment.apiUrl}/api/video/all`);
    }
    allReports() {
        return this.http.get<any>(`${environment.apiUrl}/api/report/all`);
    }

    createReport(data : any) {
        return this.http.post<any>(`${environment.apiUrl}/api/video/create/report`, data);
    }

}
@extends('layouts.admin.app')
@section('title', 'Actividades')
@section('breadcum', 'Actividades')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">
        <div class="row" id="contenendor">
            {{-- Equipment information container --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-11 mx-auto">
                                <label for="">Equipo:</label><br>
                                <div class="row">
                                    {{-- Equipment ilustration --}}
                                    <div class="col-5 text-center border">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="90" height="90" viewBox="0 0 90 90">
                                            <image id="NoPath_-_copia" data-name="NoPath - copia" width="90" height="90"
                                                opacity="0.2"
                                                xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAYAAACtWK6eAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEwAACxMBAJqcGAAAGRRJREFUeJztnXmcHFW1x789CWQhAWQLAYSAkIAgiCC4PASUTQRcwSggCILwjO8JPhYFwQ0REETRJ4osPiIPEVCRJ6BAEGWJBEPyIBhAEwNIgGAC2WYymRn/+FV9urq6urtudW3dc76fz/30TC23bt2qc+vec885FwzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMFpQKei6ewPHAeOBfmBNIPV5qTfw29tiW1QazO1ujK6lCAHZDpgHjMr4Ov1UhWU1tcLj/99MwMLnRO0L//qpP+N7M3JiZAHXPJjshQNgHS+Nz+FaYQaoFaaHgSMLKIfRJkUIyNgCrpk3I4D1vATwEWBbYEFhJTIS0VPANYfrS3Js0QUw3CliDDIS2AQYl0Ia7/0WIeiu/BXYARgquiBGfIrSYoG6Wu8AVkSkXod8KsBo0hG4YFq3nZtrwD7AHzPI18iIIgVkBPAsMDFi31pgJRKW5UQLUasUPm+VY/nWRWOI8NcqzlftAw3y/DFwkmM5jAIpUkAAvghckNO1BqkKnYtgtUpRXaaHgLdFbH8N2BxptgyjJWNR33yoQ5MvdC8Cz6DuUw9wRpNzpqZSc8awYWfU1Sr6ZU8rvQvYvsn+O9KpNiMPiu5i+awHHIrGIxsAGyFN1ybApsAEYDOyGTinzXeAzwFzgF0j9g8CewEvoxl339TG/3sA03SVhrIISFw2oCosm6H+/AQvbR5IE5BmqwgWAdsA5wNfTphHUGCihCjJ/3nmMZDwvktHpwmICxtQKzSN0qZIo5Ymb0V2XnNTzrdTGCK+QC0CzkZjuNLRzQISlx4kJBOpCs3EwG/w7/Ua5BHmQuAc4Ck0HjGa0wd8DbgECZDRoYwHJgOH03yg/hfv+ItaHGepNj2BJlONLuBpmj/sNyK/l6Jfuk5MVwMbx38U2ZF233s4sTOwZ5P9i4GfAQehicF/Aku9tAx41UvLA2llIK3y0mpq/Vf6qDqX+f34tV4a8NIg9Q5jndSd3h04AXiJgsdxZa20HwLvL7gMi4FvAdMb7D8SuKnJ+bOBt6RdqDaoBH5dUtxzogxGw+cPBfYdAvw3rX2Dfg+cCjzZ+hbTp6wCciPw0aIL4fFx4H8jtm+CWrhmdXgdatmbdSdosb8bj10K3I7mg24FtmxSh6Cv5CXILMnVpq4tyi4glyJ7J58eYEfgQ+TXPZxJtF0VwGPAbjmVo9v4KTLc3AC4GXhnjHMWAJ8F/i/DcnUEN6KWZvMG+/dFffBgq7QauB+4E7gL6dXTGDAubFLOS1O6xnBNjwJbIwuJHzicdyvw+ibPpetpJSAA36daYQ9FHFsBTkSD1awE5NA287akbuq+Xn2eTH3D1yitQEah6zR5Pl1LHAE53jumH9iqyXFXkZ2AjPOuX/RL1umpH3WdQE50LzicOw/Yv8kzaotOcFVtxFrv93HguSbH/TbDMqwA/pRh/sOFkcB3gWtQt2tP4tfrTsC9wA3AFmkXrJMFxKevxf6snZPuyTj/4cQn0TgS1O261uHcjwHzgc+TYrerGwQka8YDnwLeS3TF35tvcbqevYBZwB5oDDmNam+hFePQ3NUc4IBMSlcS4oxBjvGOebhFXoeRXl/5z8hXJcgopJsvuh/fbWkN8GmvjvdFg3nXPG5FkTwTY18QN3an3sejD4tUkgXrAFciq4qH0Ljkz455fBDNwF+E5lucSRJZ8TBgUpKLObBDjGP8Sc7d0EC9Eeu3X5waoqxN7wEOTPk6hjgZ2b19BPg34Eeo9xCXdYEzUXft68i8JVOT+jy7E826WOfkWI5gihLGtxZUluGUnkPW0RXgNKquya7pERwshZOYmvQiI73zEpz7V6TKaxXq57vI52IiMhoMsxEaiDWb/8iKJ4BdQtt6gFeADfMvzrCiDxkuXosG4T+jfkwYh+nEDAWbNHj1azSfQGvEEDLxbnWub5C2C7VfkR6k9z6PYoSjEYPAfTQOGGekwyjUwO6BAmPsCfyS6OAYzYj9nIqI7u7C74ougAP3YAKSF59BjeeRaOb9GuAoh/Njj0FMi5UeNh+SL/ui+ZIpKBjf2aiHEofYDa8JSHrMQzZERn5sjVTsRyNV7vuQt2YzBr1jY2ECki72FcmfMcD1wDdQ1Mqftzj+28jbMxYmIOliAlIcH/Z+mznSPQ18ySVTE5B0McPF4vCDVDQTkBNxNF41AUmXv6O5HiN/WgnI94A/uGaalZp3I2S6vG1o+wg0wfO9FufvkUWhUmILquXvQ1E3bqf6gO4B3lBAuYY7fjzgKAH5O/CFvArSS/MXfAtUoKJNE/JMd1G1+fpoCcoz3NKzyAUbNLse3p/Y9D3pF2RLYL8G+05G6rfhxEHAbWgN+HuR/0LZJ2E7kQHkFPUY0kQ95qUlgWNWIrMfn58Bdye9YFJbrFbBvnzuA75JF4XD96igRuI0as0crkHOVacgq1EjOatQVMWgMPw/OS9fl7SV+w0K0xLFxcheymcG3Rux+xfAgygOLyhc5hPAZd62aQWVq9N4mVpBmI0i44fDp3YErcYgf6S2/zcLORp1K9uiNQr9+x1EPjMjUIyuovvnZUqDKF7ZzcC5aOa7VVTFQsmjn7wHEpJfkXPYyIz5NerfLkBxhO9DXc8KClX6djRgf4jaL+pwYQ0yvwl+FeYgS/CuxvUL0q1pgOrsLciaNLh/AVombjvUhSi6vFmmV5G6+zsoXtmb6Yz1JFuSdJA+j8bxpo6h5J/NFOlHJu6/8f4/B7l1+jwAvAdF6rib7nhpnqdWgzQbNQZD3v6xyBR9d+QFOOzi6PZSfItVptQLvNurmwqK6B7c/xNv+ydLUFaXNIAawhtQiM8D0VJ1QTb1tp+BglHPo9YV9psMQ3pRtInRDdKDFP9w804rkOMO6CtxX2j/Wd6+i0tQ1qi0CkWxvxKpqPdGXwKfHmQd8GG0luDt6OvQKt+OF5Ckg/S1SFCi6EjVXJush0yt341CZ34IDc4ne/svRBNcZyMHnyMKKKPPEqJVqv5c1Sikop6KxhJvRpFj0o4O0xHYbG96rI9MTvZDkU/eh1rljVAXazoKW3M0UmTksa7IAmoF4TFq4xhv6JXjYCQIuyPhsPfCwyoiXTZGg/F9kO/BB5Dx4jroK3MbGrAfgYIzT0jpuv3UqlT99Kq3v4KCXLwFTWb6wjAppet3LUm1WMuRQWIUOxJ/PfFu5TkkJAuRVu/6wL6ZKFz/bsjKYLRj3q+h+YTgV+EJqtYKI9Ez8LtHu3u/ScLjtMtFqFvZsST9gqyhdmm0IN1md5WErdCX412oazWZqifb3miZ46ORA89Pm+TzD+pVqn9DA2BQsOZdkf2XLwhvIr6tnJEBNlEYPz2JJgv92fXgvnO9+voqalSe9I45E1kHbxaq183RyrBfQDP482l/9ays07DVYnUKA0hD8xfv95+oe7gKqTHHo67H9ki7NIV0l/TaEU2o7o/mQSZRXRD0a165zkddkZXe9h6vPPtT201Ka7ySBquRQD+FPCiXUa3XkWjwPwFp9DqabhSQ54BbUOyj+9GDi8tYNJ/xbqTzn9z88FjshowWD0Q2WzOpDo7/x/t9HVVB2JVyjuEeRVEM70XxbfuLLU556UURtsc1SA+R/6d8EMULPoD0loeuII3TlaRjPXA/VTOM1wqooyTpVTS5uXObddmxZO0wlTVDaJB7AequhNkIdWnehGaCJyJ7qbkontKNaFH7BUgTNBO5b4aZCJyO/DtctU5B7kYq3nO8VFaWopWavk9VVexTAbZBjcfO6Gs4Hlku96N4ueehIHrPoLqeSeuAbqUkqYDMpWqgF+YE8lnD+jFkFjGzwf5vowDHYRYjl8wxRK8+9ACa0ItiW+AKNAmYlH+gLlSiBV1y4Bqkmn25wf7ZqDsYZj56NyZQv2zFEGrEnGJSdSpFa7EGUEUHx08VZDX7FRQ04nT0IibJvw9F6dsJqU+PjbjWVNLtJi1ELfAkpCKOSq9HE33XZlSvz1MfZ2BdpIr+BOoaXoTMjJLkvwgt9TwRCUujRqjjKVJAFlO/JrY/4ZalUM5HXoJBtkdLgrWb9wrUZRmLlgyb2iB9lOq6JNekfH93UWupW0FKir+lfJ1wupMudCYrSkCeptY0YhTVgBBZPsRgupnaF2kc7bvVTvfyuj3Gsf2oQdg1xXu6mtov5BbIhyOvOl2D1n1MU71eKL2oAg9rkOaRfiXOoX4eYFoG13F5oX3WpX4S0CVd6uXzQszjj0NCmsa9XEz9OPSXBdXrp+gS8naYeoZ64RiFtFdFPMhZEeVZh+St7re8PBbHPP54YJMU7uMH1AvHVii0ThH1ejUl/IoknSj8BQptE8UPqF/DLykvIbOLF73/D0KrCk0herXZPNgDWeLeiFr9y1HX5yg0ibZXQeVy4VaqX2CQ1moD9HWaWFCZfO3ns0gR0bFLa+c1Bhmk6soKWlFodUp5p5k+Eyjj1sicpcxfkKfQvIXPmSWow3BajlYOLpwyR3f/KtX1NiajvnE7k3RZcQVVD8FFqBUuK33oC+yb3xyFw2pLOTIOKS0KD2FbVgGZQzU6yFjUJSjrEssV5O/hR3T/NfUD+bLwDVS3IM/BawssSys2QzZ1hUaCSToG2ZfG3aw0Qv+fiiakQH3lstsCrQ9cgnzRQVE+jqBcftzPIK2Vz+XUBmYoI3uiYOitlsvIjKQCsiP1a3/4tFvp05HBo0/iyNwRPIdmrVei7tqWyNwkjS9psJyLUWtdJn+Is6gNtHEXsjBulwE0ofg86sKNQ+/GFinkDY3jr5WWLAfpg0j4grSrzv0D0pCE7YN81ke+47fQ3qTjfGrVlOOJN2DPY5D+OLWNwGjamyVfi5y2DkcCEcWWwEnAw21cZwj4YYP8S0uWAnJTIJ/9kSo1aV5zkMsrKJjCCUjX/ntkIvIgCor2OapGi5Npbxb5TtQl8PlyjHPyEJBjAmWahnxlkt7jLYH62gH4PHpOD3r1eh9wFVJWvA6N0Q4k+QTyAHpOvqNZ6clSQIJ2VjPayOc7aHC3JRKKNTHOuQM5LFWQlXB/wmv7lsIgLUzRArKUqvZvfZIbWfZS1dDtRTwh84MMTvDK8KOE1x5Cyo+OoBe1EBs2SEk/qQuodgN2TJjHENUoGkksbgeQRXAP8F7iCVZU+kSgvma0ODZrAbkyUJZTEt7PajQnNRKNq1x94ZciQ8wKUt8nKcMgJVD7xiErU5MLA9e4IGEe/uz+6Q32P4pasQvR/MUMooXgBuSZeHTCcvwucC+ntjg2awEJTrY+kPB+3o/GV7dE7OtDEVy+69XrVchXJyqff0dCclXCcvghXEtNL9Iynd0gJV3Ac7/ANZ5IcP4s9BCjXuqfoP5yFJuiOZe+0DmXe/uTmJavpTpvs0OLY7MUkNVUu1cTEtzHEOquQn33aBXyHGwUb2snohfU/KBXpiRjkocoMT2oZR5ElbO4QUrSd19J1Y13w4R57I38KlYEtvVSnZtoxe5IVRnM8xD0Mr6aoDz+eKqC7IuKEJB7Avf3vgT38BLSxn04tH0h1WXnWnEstc9zGdIoHpCgPKsoj7t3HV8iWQsUJ90fuparKbuvKw+rhN/veI87UTtu+Qvqal3oWJ7rQ/k2MyHPUkCCZiQV5M/ich9fRF/lhYFtS4h2VW7GMaF8f+SVxzXAx/GO120blwmy/8isFOpSBXGdZLraO2dqYNsP0bJvQTZBwnc5CsC2fWj/k+gr6TMFDdavcSxPuPzzHc9Pi+B1h5A5e1yG0FonH0JfZp9paA4lyI4oCMXlaMz1utD+6UgV7HMc6ppd7VAeKM7SOBZZfT2GqBW+d+DmyjqATLU/G9i2lvpVrt6DtCnBc/upX4l2JNUVk4aoxq6a71CmpWjy0eeEJsdm+QUJugQcibqyce/hEe+84MB8HvWN6pnU+6m/TL3P+eTQMSeghsTlPXmQklj5RvEU2QnIRwLXcVUTz/POuymwLdj3BrU8jcYRg9QHK/hmYP8Cb9t0x3KtpfoyHd7kuCwFxLdKGONY9iGq67y/FNgWjkpyaJPzl1A/gH8ksP9ab1uchXiCKVfTE5cu1llktzhOMGaSaxRy/wUORkF8JHTMcTQ2HKxQ3338U+DvSWhgGO5WtGJE4Jou0R3TxL/uxgnOXYAUJkEf/HC9Nut2b0ztDD7U1qv/vFzrNdco9S7Gir9A3Z8HkCp3doPjJiGvu7upDzrWiIWBv13Nm/2XICgAS0LHhO27woQja4RjQo0n2Uvua1z8cKhR+F/AZ4kXf9dXozfKL4jf8CTxo1lOfaOSZr36ccFc6zVXLZarNe9M1HW4g/q+u8/x6PN5GjKSc8V1+QS/wvoC28aEjgk/2DBhgQjHxu0j2YPxTfafobYbGcWRKHBBo5d5CDVKM7z/W+UXVQ4XRlFbpxBdr9s0yaNZvfp5u9ZrkntJTBmDV7suNO9rjBZRbdHCOvqfI6O6RtwU+j94/lI0t5JkaWuXe1lIdUmEtEkS9nML9IL3UhXaNyLraJ+fo95CFINIrRwkWK/+Akyu9er6fuSOv076jxuk+1FrlzRww9moZYo7aFuOBP3rgW2vUN8yNVph9rfUNxT3Bvbf6W1zMcLsp6r9KgMVNKvtYs5/h3du8L5vD+U7CglM1Pnnh44dT60W7WzkO+QyKfwy0eFkS0Uvsl9a1iCtoj0BAQVNdtFsvBPNpAe3fToi36lIgF9A3ZX/oj7UzJ6hfKahvrjLgwwPZsuCiwnPcvTlOCuwbZD6r/MoNKE4B9XrDGROEiYcHGIXZKng8pwvaevuc6KVufvxtC8grQz8wsmP8RScP1mC28QY6GE/GsjjNTTpdaJjeVwnwPIiyjaqWToKKQ6C0WT+iHv8qu2RwPl5+N206x3Lc6zjdQshawFZH7VGLhW3Cjn5h1ukudQvZdaIUdRbq56L1LWuhnWL0ZILZWJP3LquQ0gpU6F2XmgIzQnFHb9uRf0k6z7IdN3VnWAW9YqC0pG1gPSgvqZLxQ0hE2pQ6x3cvggJTrOlHnZFOvrgeY8ioUnqQ5FG8Io0eRPJ7uPjaKzweGj7H2iu5q0ga4LwBOgV3v4k3qLPkmzJjlzJo4t1Hcke5mGo3zwjYt9MZGe1r1e2tyOf6dupdwBahKL8Taa2axA3+XMbZaJCrdFh3PQKau23o35JiQE0P3YicondBVklnEG0udCdaJ7rYwnKMUR1dr/U9KIJwGcaJN80oR0BOZhkFfgaUjuOxd1y1U+zkXBsRnLzmrIuFONqleynuWgsth3JfHWGkKX1aDTZvCphHkWFm3WiF61senODNIv2BWQEtQaDLmkZ8qKrIIO4F2OetwqtPDsaDSqTCsda3JUDebE9yZeOnou+JGORGX1cz9J/ICe2CrKMXpHw+k/SAd0ryKeLBdJ3J/UJH0Av+xj0QE9AS8aFfdT7kFbmTPTF6PGOTRrYYA1aCqHM/JLk9foK6h5VkAHoF5BPRzi/Zajr+gnU4IxDRplJrunXa5TavpTkJSA9SJ0YHhy6pGeRoG3i5VlBassd0AyuvyLuGDQYnd3GtVag2ee0VtnNihHIXq6d2AIzkWmMP8M+En01d0ANjd/Sb4bGI3HXPolKs7wyFxImt4ymJj6DXjodRQFMwlZoMc9LkJZqFhqoLkdCsRVasWkf2o8IeSHqTpSdAVQHl6EvQBL2QuY5K9DE61zkrtyL1PTbIr+Nt9L+i/2fuNvnpUZSAdmQem88nzgWqS5Mbn1IS0aiweE7UsirEVMyzDsL0lgbcBzyCTk0hbwaMQVZkHcMcTUQaS3OOAU3T7iiUtCDsBM4luLrrFVaRu26lLmT5AtyBK0LvZz0/LDnIzPwG1LKLwsuQ4PfTuJ61LU8qeiCNOE4an2FjCZ8heJbtKh0G+UeyzVjXeTYVnQdRqUzMrzvrqSCgpgtJrkaNq00iCZF76EDbINaMB4FQ3ia4oViKTIzuiDTO+5iKuiF3IVkZhNppOUoCMMIShzEzJHRSNs0lfxXMfbTU0ghM5YOmRAsO5+kmAcZDAbdjRS1vHYwpllpKOsahXGYRf5GgUvQ+iHdzK9I5qLbDnNQwGsjZUYh1848loe+jtoQON3MRKQ1zLpOV6LJykIX6hwOvB51feahCIuuMV/DaT5ylroLLdzSKDBBt/M2VAe3odWy2lm2bQjNuk9D9fs90lvH0IhJcHB3K8ke4nOBfGywKPx66CHeuotR6acR+ZWejiloArZG5tVvQx6Db0DByk5B6xRujFq0PmRa/wSy1/od1bXEjXr2QHGO90LLc09CGr13Ig3fIcj+bRlyi5iDvuh3osbHKDFjqFVMrEd3NxJ5UKE2INwIkkVyNAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMAzDMDqHfwHxjt4Q7yaeuAAAAABJRU5ErkJggg==" />
                                        </svg>
                                    </div>
                                    {{-- Equipment information --}}
                                    <div class="col-7 my-4">
                                        Marca: {{ $equip->marca }} <br>
                                        Modelo: {{ $equip->modelo }} <br>
                                        No Interno: {{ $equip->internalN }} <br>
                                        <input type="hidden" id="idAct" value="{{ $id }}">
                                        <input type="hidden" id="equip_id" value="{{ $equip->id }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- tasks section --}}
            <div class="col-12">
                <div class="list-group">
                    @php
                        $cont = 1;
                        $cont1 = 1;
                    @endphp
                    {{-- General information task --}}
                    <a class="list-group-item list-group-item-action py-4 h6" type="button" data-toggle="modal"
                        data-target="#generalmodal">{{ $cont }}. Información General Inicial <i
                            class="float-right fa fa-check text-success" style="font-size:18px;"></i></a>
                    {{-- Task container --}}
                    <div id="containtask">
                        @foreach ($list as $l)
                            @php
                                $cont++;
                            @endphp
                            <a onclick="customModal(this.id)" id="{{ $l->id }}"
                                class="list-group-item list-group-item-action py-4 h6">{{ $cont . '. ' . $l->name }}
                                @php
                                    $cont1 = 0;
                                @endphp
                                {{-- Matching Answering and asign variables --}}
                                @foreach ($answers as $a)
                                    @if ($a->list_id == $l->id)
                                        @if ($a->state == 3)
                                            <span class="badge bg-danger float-right text-white">N/A</span>
                                        @else
                                            <i class="float-right  {{ $a->state == 1 ? 'fa fa-check text-success' : 'fa fa-times text-danger' }}"
                                                style="font-size:18px;"></i>
                                        @endif
                                        <input type="hidden" id="observ{{ $l->id }}" value="{{ $a->observ }}">
                                        <input type="hidden" id="state{{ $l->id }}" value="{{ $a->state }}">
                                        <input type="hidden" id="answId{{ $l->id }}" value="{{ $a->id }}">
                                        @php
                                            $cont1 = 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </a>
                            <input type="hidden" id="funct{{ $l->id }}" value="{{ $l->funct }}">
                            <input type="hidden" id="f{{ $l->id }}" value="{{ $l->father }}">
                            <input type="hidden" id="title{{ $l->id }}" value="{{ $l->name }}">
                            <input type="hidden" id="description{{ $l->id }}" value="{{ $l->description }}">
                            <input type="hidden" id="list_id{{ $l->id }}" value="{{ $l->id }}">
                        @endforeach
                    </div>
                    {{-- General information task --}}
                    <a class="list-group-item list-group-item-action py-4 h6" type="button" data-toggle="modal"
                        data-target="#generalmodalfinish">{{ $cont + 1 }}. Informacion general final {{ $activ->endDate != "" ?  print('<i class="float-right fa fa-check text-success" style="font-size:18px;"></i>') : "" }}
                    </a>
                </div>
            </div>
            <!-- Modal custom-->
            <div class="modal fade col-12 col-md-6 col-lg-4 mx-auto" id="customModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content ">
                        <div class="modal-header bg-secondary p-3 rounded-0">
                            <h4 class="col-1">
                                <a class="text-md pointer" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-arrow-left text-white"></i>
                                </a>
                            </h4>
                            <h4 class="modal-title text-white col-8 font-weight-semibold" style="text-transform: none;"
                                id="titlemodal"></h4>
                            <h5 class="col-3">
                                <a type="button" class="text-white text-right pointer" onclick="savetask()">
                                    Guardar
                                </a>
                            </h5>
                        </div>
                        <div class="modal-body" id="content1">
                            <div id="alertcontainer">

                            </div>
                            <div class="mb-5 mt-2">
                                <input type="hidden" id="idlistmodal" value="">
                                <input type="hidden" id="idAnswer" value="">

                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="statemodal" id="statemodal">
                                    <label for="statemodal"></label>
                                </div>
                                <label for="statemodal" class="float-right mr-4 text-dark texto">Tarea realizada</label>
                            </div>
                            <p id="descriptionmodal" style="text-transform:none;"
                                class="text-dark font-weight-semibold texto">

                            </p>
                            <div id="containerFunct1"></div>
                            <div class="form-group">
                                <label for="observationmodal">Observaciones</label>
                                <textarea id="observationmodal" class="form-control"></textarea>
                            </div>
                            <div class="">
                                <div class="toggle-checkbox toggle-danger checkbox-inline toggle-sm float-left">
                                    <input type="checkbox" name="noaplica" id="noaplica">
                                    <label for="noaplica"></label>
                                </div>
                                <label for="noaplica" class="mr-4 text-dark texto float-left">No aplica</label>
                            </div>
                        </div>
                        <div class="modal-body d-none" id="content2">


                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal infogeneral -->

            <div class="modal fade" id="generalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary p-3 rounded-0">
                            <h4 class="col-1">
                                <a class="text-md" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-arrow-left text-white"></i>
                                </a>
                            </h4>
                            <h4 class="modal-title text-white col-9" id="exampleModalLabel">Informacion
                                general</h4>
                            <h5 class="col-2">
                                <a type="button" class="text-white" onclick="saveInitial()">
                                    Guardar
                                </a>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <form action="" id="initialinfo">
                                <div class="form-group">
                                    @php
                                        switch ($module) {
                                            case 1:
                                                $modules = 'inspección';
                                                break;
                                            
                                            case 2:
                                                $modules = 'mantenimiento';
                                                break;
                                            
                                            case 3:
                                                $modules = 'recarga';
                                                break;
                                            
                                            case 4:
                                                $modules = 'reinstalación';
                                                break;
                                            
                                            case 5:
                                                $modules = 'emergencia';
                                                break;
                                            
                                            default:
                                                $modules = "undefined";
                                                break;
                                        }
                                    @endphp
                                    <p class="text-dark font-weight-semibold" style="text-transform:none;">Registre información general
                                        de la actividad de {{$modules}} </p>
                                </div>
                                <div class="form-group">
                                    <small for="">Fecha inicio</small>
                                    <input type="date" name="startDate" id="startDate" class="form-control" placeholder=""
                                        value="{{ $activ->startDate }}">
                                </div>
                                <div class="form-group">
                                    <small for="">Hora inicio</small>
                                    <input type="time" name="startTime" id="startTime" class="form-control" placeholder=""
                                        value="{{ $activ->startTime }}">
                                </div>
                                <div class="form-group">
                                    <small for="">Horometro Inicio</small>
                                    <input type="text" name="horometer" id="horometer" class="form-control" placeholder=""
                                        value="{{ $activ->horometer }}">
                                    <input type="hidden" name="type_id" id="type_id" value="{{ $module }}">
                                    <input type="hidden" name="equip_id" id="equip_id" value="{{ $activ->equip_id }}">
                                </div>
                                <div class="form-group">
                                    <small for="">Lugar</small>
                                    <select name="location_id" id="location_id" class="form-control">
                                        <option value=""></option>
                                        @foreach ($locations as $l)
                                            <option value="{{ $l->id }}" {{ $l->id == $activ->location_id ? "selected" : ""}}>{{ $l->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal infogeneral -->
            <div class="modal fade" id="generalmodalfinish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary p-3 rounded-0">
                            <h4 class="col-1">
                                <a class="text-md" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-arrow-left text-white"></i>
                                </a>
                            </h4>
                            <h4 class="modal-title text-white col-9" id="exampleModalLabel">Finalizar informaci&oacute;n general</h4>
                            <h5 class="col-2">
                                <a type="button" class="text-white" onclick="saveFinal()">
                                    Guardar
                                </a>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <form action="" id="initialinfo">
                                <div class="form-group">
                                    @php
                                        switch ($module) {
                                            case 1:
                                                $modules = 'inspección';
                                                break;
                                        
                                            case 2:
                                                $modules = 'mantenimiento';
                                                break;
                                        
                                            case 3:
                                                $modules = 'recarga';
                                                break;
                                        
                                            case 4:
                                                $modules = 'reinstalación';
                                                break;
                                        
                                            case 5:
                                                $modules = 'emergencia';
                                                break;
                                        
                                            case 6:
                                                $modules = 'inspección CF210';
                                                break;
                                        
                                            case 7:
                                                $modules = 'mantenimiento CF210';
                                                break;
                                        
                                            case 8:
                                                $modules = 'recarga CF210';
                                                break;
                                        
                                            case 9:
                                                $modules = 'reinstalación CF210';
                                                break;
                                        
                                            case 10:
                                                $modules = 'emergencia CF210';
                                                break;
                                        
                                            default:
                                                $modules = 'undefined';
                                                break;
                                        }
                                    @endphp
                                    <p class="text-dark font-weight-semibold" style="text-transform:none;">Registre
                                        información para finalizar la actividad de {{ $modules }} </p>
                                </div>
                                <div class="form-group">
                                    <small for="">Fecha fin</small>
                                    <input type="date" name="EndDate" id="endDate" class="form-control" placeholder=""
                                        value="{{ $activ->endDate }}">
                                </div>
                                <div class="form-group">
                                    <small for="">Hora fin</small>
                                    <input type="time" name="EndTime" id="endTime" class="form-control" placeholder=""
                                        value="{{ $activ->endTime }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal cambiar component 1 -->
        <div class="modal fade col-12 offset-0 col-md-10 offset-md-1 col-lg-4  offset-lg-8" id="changeCompo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary p-3 rounded-0">
                        <h4 class="col-1">
                            <a class="text-md pointer" data-dismiss="modal" aria-label="Close">
                                <i class="fas fa-arrow-left text-white"></i>
                            </a>
                        </h4>
                        <h4 class="modal-title text-white col-7">Cambiar componente</h4>
                        <h5 class="col-3">
                            <a type="button" class="text-white pointer" onclick="changeCompo()">
                                seleccionar
                            </a>
                        </h5>
                    </div>
                    <div class="modal-body p-0">
    
    
                            <input type="hidden" value="" id="idOld">
                            <div class="form-group input-group mb-0">
    
                                <div class="form-group input-group mb-0">
                                    <input type="text" class="form-control mb-0" placeholder="Buscar.."
                                        onkeyup="searchCompo(this.value)">
                                    <span class="input-group-text"><a href="" class="text-custom"><i
                                                class="fas fa-search"></i></span>
                                </div>
                            </div>
    
                            <div id="containerChangeCompo" class="row col-12 m-0 p-0" style="height: 350px;overflow:auto;">
    
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')

    <script>
        function searchCompo(value) {
            $.ajax({
                url: "{{ route('activity.f12') }}",
                type: 'POST',
                data: {
                    "data": value,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    if (val.length == 0) {
                        var todo = 'No se encontraron componentes activos';
                    } else {
                        for (let x = 0; x < val.length; x++) {
                            id = val[x].compo_id;
                            name = val[x].name;
                            state = val[x].state;
                            v9 = val[x].v9;
                            v10 = val[x].v10;
                            if (state = 1) {
                                state = 'Activo';
                            } else {
                                state = 'Inactivo';
                            }
                            v10 = v10 ? v10 : 'N/A';
                            todo = '<a href="#" class="card-body border bottom col-12 px-4">';
                            todo += '<div class="row">';
                            todo += '<div class="col-2">';
                            todo +=
                                '<div class="toggle-checkbox toggle-success checkbox-inline toggle-sm mt-2 text-center">';
                            todo += '<input type="checkbox" id="' + id + '">';
                            todo += '<label for="' + id + '"></label>';
                            todo += '</div>';
                            todo += '</div>';
                            todo += '<div class="col-8">';
                            todo += '<small class="h5 text-custom text-semibold">Consecutivo: ' + v9 +
                                '</small><br>';
                            todo += '<small class="mb-0 text-custom">Fecha PH: ' + v10 + '</small>';
                            todo += '</div>';
                            todo += '<div class="col-2">';
                            todo += '<small class="float-right text-custom">';
                            todo += state;
                            todo += '<small>';
                            todo += '</div>';
                            todo += '</div>';
                            todo += '</a>';
                        }
                    }
                    $("#containerChangeCompo").html(todo);
                }
            });
        }

        function changeCompo() {
            var idActiv = $('#idAct').val();
            var selected = $('input[class=changeCompo]:checked').prop('id');
            if (selected == false) {
                alert('debe seleccionar un valor');
            } else {
                var idOld = $("#idOld").val();
                $.ajax({
                    url: "{{ route('activity.f11') }}",
                    type: 'POST',
                    data: {
                        "idOld": idOld,
                        "idNew": selected,
                        "idEquip": $("#equip_id").val(),
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        location.reload();
                    }
                });
            }

        }

        function modalchangecompo(id) {
            var item_id = $('#item_id' + id).val();
            var idOld = id;
            $('#idOld').val(id);
            $('#changeCompo').modal('show');

            $.ajax({
                url: "{{ route('activity.f10') }}",
                type: 'POST',
                data: {
                    "item_id": item_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    for (let x = 0; x < val.length; x++) {
                        id = val[x].compo_id;
                        name = val[x].name;
                        state = val[x].state;
                        v9 = val[x].v9;
                        v10 = val[x].v10;
                        if (state = 1) {
                            state = 'Activo';
                        } else {
                            state = 'Inactivo';
                        }

                        todo = '<a href="#" class="card-body border bottom col-12 py-2 px-4">';
                        todo += '<div class="row">';
                        todo += '<div class="col-2">';
                        todo +=
                            '<div class="toggle-checkbox toggle-success checkbox-inline toggle-sm mt-2 text-center">';
                        todo += '<input type="checkbox" id="' + id + '" class="changeCompo">';
                        todo += '<label for="' + id + '"></label>';
                        todo += '</div>';
                        todo += '</div>';
                        todo += '<div class="col-8">';
                        todo += '<small class="h5 text-custom text-semibold">Consecutivo: ' + v9 +
                            '</small><br>';
                        todo += '<small class="mb-0 text-custom">Fecha PH: ' + v10 + '</small>';
                        todo += '</div>';
                        todo += '<div class="col-2">';
                        todo += '<small class="float-right text-custom">';
                        todo += state;
                        todo += '<small>';
                        todo += '</div>';
                        todo += '</div>';
                        todo += '</a>';
                    }
                        $("#containerChangeCompo").html(todo);
                }
            });
        }
        // savetask function
        function savetask() {
            // variables
            var observation = $('#observationmodal').val();
            var idActiv = $('#idAct').val();
            var idList = $('#idlistmodal').val();
            var state = $('#statemodal').prop('checked') ? 'on' : '';
            var idAnswer = $('#idAnswer').val();
            var arrdata = $('#arrdata').val();
            var na = $('#noaplica').prop('checked') ? 'on' : '';
            var cont1 = 0;
            var cont2 = 0;
            var v1;
            var state2;
            ///multiple task
            if (arrdata) {
                arrdata = arrdata.split(',');
                if (arrdata.length > 0) {
                    for (let x = 0; x < arrdata.length; x++) {
                        id = arrdata[x];
                        state = $('#statemodal' + id).prop('checked') ? 'on' : '';
                        observation = $('#observationmodal' + id).val();
                        idAnswer2 = $('#idAnswer' + id).val();
                        na = $('#noaplica' + id).prop('checked') ? 'on' : '';
                        v1 = $('#v1' + id).val();
                        if (state == '') {
                            cont1++;
                        }
                        if (na == '') {
                            cont2++;
                        } else {
                            cont1--;
                        }
                        $.ajax({
                            url: "{{ route('activity.savetask') }}",
                            type: 'POST',
                            data: {
                                "state": state,
                                "idAnswer": idAnswer2,
                                "observation": observation,
                                "idActiv": idActiv,
                                "idList": id,
                                "na": na,
                                "v1": v1,
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)

                            }
                        });

                    }
                    if (cont1 <= 0) {
                        state2 = 'on';
                    } else {
                        state2 = '';
                    }
                    if (cont2 == 0) {
                        na2 = 'on';
                    } else {
                        na2 = '';
                    }
                    //save task main with subtask states validations
                    $.ajax({
                        url: "{{ route('activity.savetask') }}",
                        type: 'POST',
                        data: {
                            "idAnswer": $('#actansid').val(),
                            "idActiv": idActiv,
                            "idList": idList,
                            "state": state2,
                            "na": na2,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            var val = JSON.parse(res)
                            location.reload();
                        }
                    });
                }
            } else {
                //save simple task
                $.ajax({
                    url: "{{ route('activity.savetask') }}",
                    type: 'POST',
                    data: {
                        "state": state,
                        "idAnswer": idAnswer,
                        "observation": observation,
                        "idActiv": idActiv,
                        "idList": idList,
                        "na": na,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        location.reload();
                    }
                });
            }
        }
        //buiding custom modal dinamic
        function customModal(id) {
            //variables
            var title = $('#title' + id).val();
            var description = $('#description' + id).val();
            var observation = $('#observ' + id).val();
            var state = $('#state' + id).val();
            var father = $('#f' + id).val();
            var funct = $('#funct' + id).val();
            var answId = $('#answId' + id).val() ? $('#answId' + id).val() : '';
            var todo;
            var complement = '';
            var complement2 = '';
            var idlist = id;

            $("#containerFunct1").html('');
            //task with function
            if (funct == '1') {
                switch (id) {
                    case '39':
                        $.ajax({
                            url: "{{ route('activity.f2') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Batería para Módulo CHECKFIRE SC-N</label>';
                                } else {
                                    var a = moment(val.val);
                                    var b = new Date();
                                    var total = a.diff(b, 'days');
                                    var v1;

                                    var e = new Date()
                                    var f = new Date()
                                    var d;
                                    var m;
                                    var s;
                                    e.setMonth(e.getMonth() - 6)
                                    e = e.getFullYear() + "-" + (e.getMonth() + 1) + "-" + e.getDate();
                                    f.setDate(f.getDate() + 8)
                                    if (f.getDate() < 10) {
                                        d = '0' + f.getDate()
                                    }
                                    s = f.getMonth() + 1;
                                    if (s < 10) {
                                        m = '0' + s;
                                    }
                                    f = f.getFullYear() + "-" + m + "-" + d;
                                    total = total + 365;
                                    if (total < 0) {
                                        v1 = 'is-invalid';
                                    } else {
                                        v1 = 'is-valid';
                                    }
                                    complement2 = '<label>' + val.label + '</label>';
                                    complement2 += '<input type="date" min="' + e + '" max="' + f +
                                        '"  id="ctl' + val.id +
                                        '" class="form-control ' + v1 + '" onchange="A1(' + val.id +
                                        ')" value="' + val.val + '">';
                                    complement2 +=
                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                    complement2 +=
                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });

                        break;
                    case '474':
                        $.ajax({
                            url: "{{ route('activity.f2') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Batería para Módulo CHECKFIRE SC-N</label>';
                                } else {
                                    var a = moment(val.val);
                                    var b = new Date();
                                    var total = a.diff(b, 'days');
                                    var v1;

                                    var e = new Date()
                                    var f = new Date()
                                    var d;
                                    var m;
                                    var s;
                                    e.setMonth(e.getMonth() - 6)
                                    e = e.getFullYear() + "-" + (e.getMonth() + 1) + "-" + e.getDate();
                                    f.setDate(f.getDate() + 8)
                                    if (f.getDate() < 10) {
                                        d = '0' + f.getDate()
                                    }
                                    s = f.getMonth() + 1;
                                    if (s < 10) {
                                        m = '0' + s;
                                    }
                                    f = f.getFullYear() + "-" + m + "-" + d;
                                    total = total + 365;
                                    if (total < 0) {
                                        v1 = 'is-invalid';
                                    } else {
                                        v1 = 'is-valid';
                                    }
                                    complement2 = '<label>' + val.label + '</label>';
                                    complement2 += '<input type="date" min="' + e + '" max="' + f +
                                        '"  id="ctl' + val.id +
                                        '" class="form-control ' + v1 + '" onchange="A1(' + val.id +
                                        ')" value="' + val.val + '">';
                                    complement2 +=
                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                    complement2 +=
                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });

                        break;
                    case '4':
                        $.ajax({
                            url: "{{ route('activity.f2') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Batería para Módulo CHECKFIRE SC-N</label>';
                                } else {
                                    var a = moment(val.val);
                                    var b = new Date();
                                    var total = a.diff(b, 'days');
                                    var v1;

                                    var e = new Date()
                                    var f = new Date()
                                    var d;
                                    var m;
                                    var s;
                                    e.setMonth(e.getMonth() - 6)
                                    e = e.getFullYear() + "-" + (e.getMonth() + 1) + "-" + e.getDate();
                                    f.setDate(f.getDate() + 8)
                                    if (f.getDate() < 10) {
                                        d = '0' + f.getDate()
                                    }
                                    s = f.getMonth() + 1;
                                    if (s < 10) {
                                        m = '0' + s;
                                    }
                                    f = f.getFullYear() + "-" + m + "-" + d;
                                    total = total + 365;
                                    if (total < 0) {
                                        v1 = 'is-invalid';
                                    } else {
                                        v1 = 'is-valid';
                                    }
                                    complement2 = '<label>' + val.label + '</label>';
                                    complement2 += '<input type="date" min="' + e + '" max="' + f +
                                        '"  id="ctl' + val.id +
                                        '" class="form-control ' + v1 + '" onchange="A1(' + val.id +
                                        ')" value="' + val.val + '">';
                                    complement2 +=
                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                    complement2 +=
                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });

                        break;
                    case '346':
                        $.ajax({
                            url: "{{ route('activity.f2') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Batería para Módulo CHECKFIRE SC-N</label>';
                                } else {
                                    var a = moment(val.val);
                                    var b = new Date();
                                    var total = a.diff(b, 'days');
                                    var v1;

                                    var e = new Date()
                                    var f = new Date()
                                    var d;
                                    var m;
                                    var s;
                                    e.setMonth(e.getMonth() - 6)
                                    e = e.getFullYear() + "-" + (e.getMonth() + 1) + "-" + e.getDate();
                                    f.setDate(f.getDate() + 8)
                                    if (f.getDate() < 10) {
                                        d = '0' + f.getDate()
                                    }
                                    s = f.getMonth() + 1;
                                    if (s < 10) {
                                        m = '0' + s;
                                    }
                                    f = f.getFullYear() + "-" + m + "-" + d;
                                    total = total + 365;
                                    if (total < 0) {
                                        v1 = 'is-invalid';
                                    } else {
                                        v1 = 'is-valid';
                                    }
                                    complement2 = '<label>' + val.label + '</label>';
                                    complement2 += '<input type="date" min="' + e + '" max="' + f +
                                        '"  id="ctl' + val.id +
                                        '" class="form-control ' + v1 + '" onchange="A1(' + val.id +
                                        ')" value="' + val.val + '">';
                                    complement2 +=
                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                    complement2 +=
                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '71':
                        $.ajax({
                            url: "{{ route('activity.f27') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val.length == 0) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta capsulas AMR</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion2" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v14 = val[x].v14;
                                        ControlFillId = val[x].ControlFillId;
                                        itemId = val[x].itId;
                                        compo_id = val[x].compo_id;
                                        cont = x + 1;
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                            id +
                                            '" aria-expanded="true" aria-controls="colla1' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="colla1' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion2">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Seria/Consecutivo</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                            ControlFillId + '"  value="' + v14 + '">';
                                        complement2 +=
                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                            ControlFillId + '" value="' + itemId + '">';
                                        complement2 += '<input type="hidden" id="item_id' + compo_id +
                                            '" value="' + itemId + '">';
                                        complement2 +=
                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                            compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '119':
                        $.ajax({
                            url: "{{ route('activity.f27') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val.length == 0) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion2" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v14 = val[x].v14;
                                        ControlFillId = val[x].ControlFillId;
                                        itemId = val[x].itId;
                                        compo_id = val[x].compo_id;
                                        cont = x + 1;
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                            id +
                                            '" aria-expanded="true" aria-controls="colla1' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="colla1' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion2">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Seria/Consecutivo</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                            ControlFillId + '"  value="' + v14 + '">';
                                        complement2 +=
                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                            ControlFillId + '" value="' + itemId + '">';
                                        complement2 += '<input type="hidden" id="item_id' + compo_id +
                                            '" value="' + itemId + '">';
                                        complement2 +=
                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                            compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '456':
                        $.ajax({
                            url: "{{ route('activity.f27') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val.length == 0) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion2" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v14 = val[x].v14;
                                        ControlFillId = val[x].ControlFillId;
                                        itemId = val[x].itId;
                                        compo_id = val[x].compo_id;
                                        cont = x + 1;
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                            id +
                                            '" aria-expanded="true" aria-controls="colla1' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="colla1' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion2">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Seria/Consecutivo</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                            ControlFillId + '"  value="' + v14 + '">';
                                        complement2 +=
                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                            ControlFillId + '" value="' + itemId + '">';
                                        complement2 += '<input type="hidden" id="item_id' + compo_id +
                                            '" value="' + itemId + '">';
                                        complement2 +=
                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                            compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '73':
                        $.ajax({
                            url: "{{ route('activity.f28') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val.length == 0) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con capsulas AMA</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion2" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v14 = val[x].v14;
                                        ControlFillId = val[x].ControlFillId;
                                        itemId = val[x].itId;
                                        compo_id = val[x].compo_id;
                                        cont = x + 1;
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                            id +
                                            '" aria-expanded="true" aria-controls="colla1' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="colla1' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion2">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Seria/Consecutivo</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                            ControlFillId + '"  value="' + v14 + '">';
                                        complement2 +=
                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                            ControlFillId + '" value="' + itemId + '">';
                                        complement2 += '<input type="hidden" id="item_id' + compo_id +
                                            '" value="' + itemId + '">';
                                        complement2 +=
                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                            compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '475':
                        $.ajax({
                            url: "{{ route('activity.f4') }}",
                            type: 'POST',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "idEquip": $("#equip_id").val(),
                            },
                            success: function(res) {
                                var val = JSON.parse(res);
                                var a = moment(val.val);
                                var b = new Date()
                                var total = a.diff(b, 'days');
                                var v1;
                                var e = new Date()
                                var f = new Date()
                                var d;
                                var m;
                                var s;
                                e.setMonth(e.getMonth() - 6)
                                e = e.getFullYear() + "-" + (e.getMonth() + 1) +
                                    "-" + e.getDate();
                                f.setDate(f.getDate() + 8)
                                if (f.getDate() < 10) {
                                    d = '0' + f.getDate()
                                }
                                s = f.getMonth() + 1;
                                if (s < 10) {
                                    m = '0' + s;
                                }
                                f = f.getFullYear() + "-" + m + "-" + d;
                                total = total + 1825;
                                if (total < 0) {
                                    v1 = 'is-invalid';
                                } else {
                                    v1 = 'is-valid';
                                }
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Protracting (PAD)</label>';
                                } else {
                                    complement2 = '<label> Fecha de instalacion</label>';
                                    complement2 +=
                                        '<input type="date" max="' + f +
                                        '" id="ctl' + val.id +
                                        '" class="form-control ' + v1 +
                                        '" onchange="A1(' + val.id +
                                        ')" value="' + val.val + '">';
                                    complement2 +=
                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                    complement2 +=
                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });

                        break;
                    case '29':
                        $.ajax({
                            url: "{{ route('activity.f28') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val.length == 0) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion2" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v14 = val[x].v14;
                                        ControlFillId = val[x].ControlFillId;
                                        itemId = val[x].itId;
                                        compo_id = val[x].compo_id;
                                        cont = x + 1;
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                            id +
                                            '" aria-expanded="true" aria-controls="colla1' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="colla1' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion2">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Seria/Consecutivo</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                            ControlFillId + '"  value="' + v14 + '">';
                                        complement2 +=
                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                            ControlFillId + '" value="' + itemId + '">';
                                        complement2 += '<input type="hidden" id="item_id' + compo_id +
                                            '" value="' + itemId + '">';
                                        complement2 +=
                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                            compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '121':
                        $.ajax({
                            url: "{{ route('activity.f28') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val.length == 0) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion2" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v14 = val[x].v14;
                                        ControlFillId = val[x].ControlFillId;
                                        itemId = val[x].itId;
                                        compo_id = val[x].compo_id;
                                        cont = x + 1;
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                            id +
                                            '" aria-expanded="true" aria-controls="colla1' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="colla1' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion2">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Seria/Consecutivo</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                            ControlFillId + '"  value="' + v14 + '">';
                                        complement2 +=
                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                            ControlFillId + '" value="' + itemId + '">';
                                        complement2 += '<input type="hidden" id="item_id' + compo_id +
                                            '" value="' + itemId + '">';
                                        complement2 +=
                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                            compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '460':
                        $.ajax({
                            url: "{{ route('activity.f28') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val.length == 0) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion2" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v14 = val[x].v14;
                                        ControlFillId = val[x].ControlFillId;
                                        itemId = val[x].itId;
                                        compo_id = val[x].compo_id;
                                        cont = x + 1;
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                            id +
                                            '" aria-expanded="true" aria-controls="colla1' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="colla1' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion2">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Seria/Consecutivo</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                            ControlFillId + '"  value="' + v14 + '">';
                                        complement2 +=
                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                            ControlFillId + '" value="' + itemId + '">';
                                        complement2 += '<input type="hidden" id="item_id' + compo_id +
                                            '" value="' + itemId + '">';
                                        complement2 +=
                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                            compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });
                        break;
                    case '477':
                        $.ajax({
                            url: "{{ route('activity.f7') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                } else {
                                    complement2 =
                                        '<div id="accordion" class="w-100 mb-3">';
                                    for (let x = 0; x < val.length; x++) {
                                        id = val[x].compo_id;
                                        name = val[x].name;
                                        v9 = val[x].v9;
                                        v10 = val[x].v10;
                                        cont = x + 1;
                                        var a = moment(v10);
                                        var b = new Date()
                                        var total = a.diff(b, 'days');
                                        var v1;
                                        var v2;
                                        var v3;
                                        var e = new Date()
                                        var f = new Date()
                                        var d;
                                        var m;
                                        var s;
                                        e.setMonth(e.getMonth() - 6)
                                        e = e.getFullYear() + "-" + (e.getMonth() +
                                            1) + "-" + e.getDate();
                                        f.setDate(f.getDate() + 8)
                                        if (f.getDate() < 10) {
                                            d = '0' + f.getDate()
                                        }
                                        s = f.getMonth() + 1;
                                        if (s < 10) {
                                            m = '0' + s;
                                        }
                                        f = f.getFullYear() + "-" + m + "-" + d;
                                        total = total + 4380;
                                        if (total < 0) {
                                            v1 = 'is-invalid';
                                            v2 = 'text-danger'
                                            v3 = '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                id +
                                                ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                        } else {
                                            v1 = 'is-valid';
                                            v2 = 'text-custom';
                                            v3 = '';
                                        }
                                        complement2 +=
                                            '<div class="card mb-0 rounded-0">';
                                        complement2 +=
                                            '<div class="card-header" id="heading' +
                                            id + '">';
                                        complement2 +=
                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent ' +
                                            v2 +
                                            '" data-toggle="collapse" data-target="#collapse' +
                                            id +
                                            '" aria-expanded="true" aria-controls="collapse' +
                                            id + '">';
                                        complement2 += name + ' <' + cont + '>';
                                        complement2 +=
                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                        complement2 += '</button>';
                                        complement2 += '</div>';
                                        complement2 += '<div id="collapse' + id +
                                            '" class="collapse" aria-labelledby="heading' +
                                            id + '" data-parent="#accordion">';
                                        complement2 += '<div class="card-body">';
                                        complement2 += '<label>Serial</label>';
                                        complement2 +=
                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                            v9 + '">';
                                        complement2 += '<label>Fecha PH</label>';
                                        complement2 +=
                                            '<input type="date" disabled class="form-control mb-3 ' +
                                            v1 + '" value="' +
                                            v10 + '">';
                                        complement2 +=
                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                        complement2 +=
                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                        complement2 += v3;
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                        complement2 += '</div>';
                                    }
                                    complement2 += '</div>';
                                    $("#containerFunct1").html(complement2);
                                }

                            }
                        });
                        break;
                    case '473':

                        $.ajax({
                            url: "{{ route('activity.f1') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Módulo de Control CHECKFIRE SC-N</label>';
                                } else {
                                    complement2 = '<label>Serial</label>';
                                    complement2 +=
                                        '<input type="text" class="form-control mb-3" disabled value="' + val
                                        .cvalue + '">';
                                    complement2 += '<input type="hidden" id="item_id' + val.compo_id +
                                        '" value="' + val.item_id + '">';
                                    complement2 +=
                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                        val.compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });

                        break;
                    case '476':
                        $.ajax({
                            url: "{{ route('activity.f5') }}",
                            type: 'POST',
                            data: {
                                "idEquip": $("#equip_id").val(),
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function(res) {
                                var val = JSON.parse(res)
                                if (val == null) {
                                    complement2 =
                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                } else {
                                    complement2 = '<label>' + val.label +
                                        '</label>';
                                    complement2 +=
                                        '<input type="date" id="ctl' + val.id +
                                        '" class="form-control" onchange="A1(' +
                                        val.id + ')" value="' + val.val + '">';
                                }
                                $("#containerFunct1").html(complement2);
                            }
                        });

                        break;
                    default:
                        break;
                }
            }
            //task father
            if (father == 1) {
                $("#content1").addClass("d-none");
                $("#content2").removeClass("d-none");
                $('#customModal').modal('show');
                $('#titlemodal').text(title);
                $.ajax({
                    url: "{{ route('activity.parents') }}",
                    type: 'POST',
                    data: {
                        "idActiv": $('#idAct').val(),
                        "idlist": document.getElementById('idlistmodal').value = id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        todo = '<div id="alertcontainer2">';
                        todo += '</div>';
                        todo += '<input type="hidden" id="actansid" value="' + answId + '">';
                        todo += '<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">';
                        var arr = [];
                        for (let x = 0; x < val.length; x++) {
                            var s = x + 1;
                            if (x == 0) {
                                complement = 'active';
                            } else {
                                complement = '';
                            }
                            id = val[x].id;
                            arr.push(val[x].id);
                            todo += '<li class="nav-item">';
                            todo += '<a class="nav-link ' + complement + '" id="pills' + id +
                                'tab" data-toggle="pill" href="#pills' + id +
                                '" role="tab" aria-controls="pills' + id + '" aria-selected="true">' + s +
                                '</a>';
                            todo += '</li>';
                        }
                        todo += '</ul>';
                        todo += '<div class="tab-content" id="pills-tabContent">';
                        for (let x = 0; x < val.length; x++) {
                            id = val[x].id;
                            name = val[x].name;
                            funct = val[x].funct;
                            description = val[x].description;
                            observation = val[x].observ;
                            state = val[x].stateanswer;
                            idanswer = val[x].idanswer;
                            v1 = val[x].v1;
                            var container1 = "";
                            var na;
                            if (x == 0) {
                                complement = 'active show';
                            } else {
                                complement = '';
                            }
                            if (funct == 1) {
                                container1 = '<div id="containerFunct' + id + '"></div>';
                                switch (id) {
                                    case 37:

                                        $.ajax({
                                            url: "{{ route('activity.f1') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Módulo de Control CHECKFIRE SC-N</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 37).html(complement2);
                                            }
                                        });

                                        break;
                                    case 205:

                                        $.ajax({
                                            url: "{{ route('activity.f29') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Extintor I-A-20-G</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 205).html(complement2);
                                            }
                                        });

                                        break;
                                    case 230:

                                        $.ajax({
                                            url: "{{ route('activity.f29') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                console.log(val);
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Extintor I-A-20-G</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 230).html(complement2);
                                            }
                                        });

                                        break;
                                    case 231:

                                        $.ajax({
                                            url: "{{ route('activity.f30') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;


                                                        total = total + 355;

                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 231).html(complement2);
                                            }
                                        });

                                        break;
                                    case 206:

                                        $.ajax({
                                            url: "{{ route('activity.f30') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;


                                                        total = total + 355;

                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 206).html(complement2);
                                            }
                                        });

                                        break;
                                    case 268:
                                        $.ajax({
                                            url: "{{ route('activity.f2') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Batería para Módulo CHECKFIRE SC-N</label>';
                                                } else {
                                                    var a = moment(val.val);
                                                    var b = new Date();
                                                    var total = a.diff(b, 'days');
                                                    var v1;

                                                    var e = new Date()
                                                    var f = new Date()
                                                    var d;
                                                    var m;
                                                    var s;
                                                    e.setMonth(e.getMonth() - 6)
                                                    e = e.getFullYear() + "-" + (e.getMonth() + 1) +
                                                        "-" + e.getDate();
                                                    f.setDate(f.getDate() + 8)
                                                    if (f.getDate() < 10) {
                                                        d = '0' + f.getDate()
                                                    }
                                                    s = f.getMonth() + 1;
                                                    if (s < 10) {
                                                        m = '0' + s;
                                                    }
                                                    f = f.getFullYear() + "-" + m + "-" + d;
                                                    total = total + 365;
                                                    if (total < 0) {
                                                        v1 = 'is-invalid';
                                                    } else {
                                                        v1 = 'is-valid';
                                                    }
                                                    complement2 = '<label>' + val.label +
                                                    '</label>';
                                                    complement2 += '<input type="date" min="' + e +
                                                        '" max="' + f +
                                                        '"  id="ctl' + val.id +
                                                        '" class="form-control ' + v1 +
                                                        '" onchange="A1(' + val.id +
                                                        ')" value="' + val.val + '">';
                                                    complement2 +=
                                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                    complement2 +=
                                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                }
                                                $("#containerFunct" + 268).html(complement2);
                                            }
                                        });
                                        break;
                                    case 332:

                                        $.ajax({
                                            url: "{{ route('activity.f30') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;


                                                        total = total + 355;

                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 332).html(complement2);
                                            }
                                        });

                                        break;
                                    case 465:

                                        $.ajax({
                                            url: "{{ route('activity.f30') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;


                                                        total = total + 355;

                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 465).html(complement2);
                                            }
                                        });

                                        break;
                                    case 331:

                                        $.ajax({
                                            url: "{{ route('activity.f29') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Extintor I-A-20-G</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 331).html(complement2);
                                            }
                                        });

                                        break;
                                    case 464:

                                        $.ajax({
                                            url: "{{ route('activity.f29') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Extintor I-A-20-G</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 464).html(complement2);
                                            }
                                        });

                                        break;

                                    case 214:

                                        $.ajax({
                                            url: "{{ route('activity.f1') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Módulo de Control CHECKFIRE SC-N</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 214).html(complement2);
                                            }
                                        });

                                        break;
                                    case 278:

                                        $.ajax({
                                            url: "{{ route('activity.f1') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Módulo de Control CHECKFIRE SC-N</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 278).html(complement2);
                                            }
                                        });

                                        break;
                                    case 344:

                                        $.ajax({
                                            url: "{{ route('activity.f1') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Módulo de Control CHECKFIRE SC-N</label>';
                                                } else {
                                                    complement2 = '<label>Serial</label>';
                                                    complement2 +=
                                                        '<input type="text" class="form-control mb-3" disabled value="' +
                                                        val.cvalue + '">';
                                                    complement2 +=
                                                        '<input type="hidden" id="item_id' + val
                                                        .compo_id + '" value="' + val.item_id +
                                                        '">';
                                                    complement2 +=
                                                        '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                        val.compo_id +
                                                        ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 344).html(complement2);
                                            }
                                        });

                                        break;
                                    case 125:
                                        $.ajax({
                                            url: "{{ route('activity.f4') }}",
                                            type: 'POST',
                                            data: {
                                                "_token": "{{ csrf_token() }}",
                                                "idEquip": $("#equip_id").val(),
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res);
                                                var a = moment(val.val);
                                                var b = new Date()
                                                var total = a.diff(b, 'days');
                                                var v1;
                                                var e = new Date()
                                                var f = new Date()
                                                var d;
                                                var m;
                                                var s;
                                                e.setMonth(e.getMonth() - 6)
                                                e = e.getFullYear() + "-" + (e.getMonth() + 1) +
                                                    "-" + e.getDate();
                                                f.setDate(f.getDate() + 8)
                                                if (f.getDate() < 10) {
                                                    d = '0' + f.getDate()
                                                }
                                                s = f.getMonth() + 1;
                                                if (s < 10) {
                                                    m = '0' + s;
                                                }
                                                f = f.getFullYear() + "-" + m + "-" + d;
                                                total = total + 1825;
                                                if (total < 0) {
                                                    v1 = 'is-invalid';
                                                } else {
                                                    v1 = 'is-valid';
                                                }
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Protracting (PAD)</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" max="' + f +
                                                        '" id="ctl' + val.id +
                                                        '" class="form-control ' + v1 +
                                                        '" onchange="A1(' + val.id +
                                                        ')" value="' + val.val + '">';
                                                    complement2 +=
                                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                    complement2 +=
                                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                }
                                                $("#containerFunct" + 125).html(complement2);
                                            }
                                        });

                                        break;
                                    case 352:
                                        $.ajax({
                                            url: "{{ route('activity.f4') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res);
                                                var a = moment(val.val);
                                                var b = new Date()
                                                var total = a.diff(b, 'days');
                                                var v1;
                                                var e = new Date()
                                                var f = new Date()
                                                var d;
                                                var m;
                                                var s;
                                                e.setMonth(e.getMonth() - 6)
                                                e = e.getFullYear() + "-" + (e.getMonth() + 1) +
                                                    "-" + e.getDate();
                                                f.setDate(f.getDate() + 8)
                                                if (f.getDate() < 10) {
                                                    d = '0' + f.getDate()
                                                }
                                                s = f.getMonth() + 1;
                                                if (s < 10) {
                                                    m = '0' + s;
                                                }
                                                f = f.getFullYear() + "-" + m + "-" + d;
                                                total = total + 1825;
                                                if (total < 0) {
                                                    v1 = 'is-invalid';
                                                } else {
                                                    v1 = 'is-valid';
                                                }
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Protracting (PAD)</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" max="' + f +
                                                        '" id="ctl' + val.id +
                                                        '" class="form-control ' + v1 +
                                                        '" onchange="A1(' + val.id +
                                                        ')" value="' + val.val + '">';
                                                    complement2 +=
                                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                    complement2 +=
                                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                }
                                                $("#containerFunct" + 352).html(complement2);
                                            }
                                        });

                                        break;
                                    case 262:
                                        $.ajax({
                                            url: "{{ route('activity.f4') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res);
                                                var a = moment(val.val);
                                                var b = new Date()
                                                var total = a.diff(b, 'days');
                                                var v1;
                                                var e = new Date()
                                                var f = new Date()
                                                var d;
                                                var m;
                                                var s;
                                                e.setMonth(e.getMonth() - 6)
                                                e = e.getFullYear() + "-" + (e.getMonth() + 1) +
                                                    "-" + e.getDate();
                                                f.setDate(f.getDate() + 8)
                                                if (f.getDate() < 10) {
                                                    d = '0' + f.getDate()
                                                }
                                                s = f.getMonth() + 1;
                                                if (s < 10) {
                                                    m = '0' + s;
                                                }
                                                f = f.getFullYear() + "-" + m + "-" + d;
                                                total = total + 1825;
                                                if (total < 0) {
                                                    v1 = 'is-invalid';
                                                } else {
                                                    v1 = 'is-valid';
                                                }
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Protracting (PAD)</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" max="' + f +
                                                        '" id="ctl' + val.id +
                                                        '" class="form-control ' + v1 +
                                                        '" onchange="A1(' + val.id +
                                                        ')" value="' + val.val + '">';
                                                    complement2 +=
                                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                    complement2 +=
                                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                }
                                                $("#containerFunct" + 262).html(complement2);
                                            }
                                        });

                                        break;
                                    case 325:
                                        $.ajax({
                                            url: "{{ route('activity.f4') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                var a = moment(val.val);
                                                var b = new Date()
                                                var total = a.diff(b, 'days');
                                                var v1;
                                                total = total + 365;
                                                if (total < 0) {
                                                    v1 = 'is-invalid';
                                                } else {
                                                    v1 = 'is-valid';
                                                }
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Protracting (PAD)</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" id="ctl' + val.id +
                                                        '" class="form-control ' + v1 +
                                                        '" onchange="A1(' + val.id +
                                                        ')" value="' + val.val + '">';
                                                    complement2 +=
                                                        '<div class="invalid-feedback mb-3">Expiro hace ' +
                                                        total + ' dias</div>';
                                                    complement2 +=
                                                        '<div class="valid-feedback mb-3">Expira en ' +
                                                        total + ' dias</div>';
                                                }
                                                $("#containerFunct" + 325).html(complement2);
                                            }
                                        });

                                        break;
                                    case 130:
                                        $.ajax({
                                            url: "{{ route('activity.f5') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" id="ctl' + val.id +
                                                        '" class="form-control" onchange="A1(' +
                                                        val.id + ')" value="' + val.val + '">';
                                                }
                                                $("#containerFunct" + 130).html(complement2);
                                            }
                                        });

                                        break;
                                    case 216:
                                        $.ajax({
                                            url: "{{ route('activity.f5') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" id="ctl' + val.id +
                                                        '" class="form-control" onchange="A1(' +
                                                        val.id + ')" value="' + val.val + '">';
                                                }
                                                $("#containerFunct" + 216).html(complement2);
                                            }
                                        });

                                        break;
                                    case 271:
                                        $.ajax({
                                            url: "{{ route('activity.f5') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" id="ctl' + val.id +
                                                        '" class="form-control" onchange="A1(' +
                                                        val.id + ')" value="' + val.val + '">';
                                                }
                                                $("#containerFunct" + 271).html(complement2);
                                            }
                                        });

                                        break;
                                    case 358:
                                        $.ajax({
                                            url: "{{ route('activity.f5') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 = '<label>' + val.label +
                                                        '</label>';
                                                    complement2 +=
                                                        '<input type="date" id="ctl' + val.id +
                                                        '" class="form-control" onchange="A1(' +
                                                        val.id + ')" value="' + val.val + '">';
                                                }
                                                $("#containerFunct" + 358).html(complement2);
                                            }
                                        });

                                        break;
                                    case 138:
                                        $.ajax({
                                            url: "{{ route('activity.f8') }}",
                                            type: 'POST',
                                            data: {
                                                "idAct": $("#idAct").val(),
                                                "idList": 138,
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 += '<input type="number" id="v1' +
                                                        138 +
                                                        '" class="form-control mb-3" value="">';
                                                } else {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 +=
                                                        '<input type="number"  id="v1' + 138 +
                                                        '" class="form-control mb-3" value="' + val
                                                        .v1 + '">';
                                                    // complement2 += '<input type="hidden" id="item_id' + val.compo_id + '" value="' + val.item_id + '">';
                                                    // complement2 += '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' + val.compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 138).html(complement2);
                                            }
                                        });
                                        break;
                                    case 281:
                                        $.ajax({
                                            url: "{{ route('activity.f8') }}",
                                            type: 'POST',
                                            data: {
                                                "idAct": $("#idAct").val(),
                                                "idList": 281,
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 += '<input type="number" id="v1' +
                                                        281 +
                                                        '" class="form-control mb-3" value="">';
                                                } else {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 +=
                                                        '<input type="number"  id="v1' + 281 +
                                                        '" class="form-control mb-3" value="' + val
                                                        .v1 + '">';
                                                    // complement2 += '<input type="hidden" id="item_id' + val.compo_id + '" value="' + val.item_id + '">';
                                                    // complement2 += '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' + val.compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 281).html(complement2);
                                            }
                                        });
                                        break;
                                    case 368:
                                        $.ajax({
                                            url: "{{ route('activity.f8') }}",
                                            type: 'POST',
                                            data: {
                                                "idAct": $("#idAct").val(),
                                                "idList": 368,
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 += '<input type="number" id="v1' +
                                                        368 +
                                                        '" class="form-control mb-3" value="">';
                                                } else {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 +=
                                                        '<input type="number"  id="v1' + 368 +
                                                        '" class="form-control mb-3" value="' + val
                                                        .v1 + '">';
                                                    // complement2 += '<input type="hidden" id="item_id' + val.compo_id + '" value="' + val.item_id + '">';
                                                    // complement2 += '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' + val.compo_id + ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                }
                                                $("#containerFunct" + 368).html(complement2);
                                            }
                                        });
                                        break;
                                    case 139:
                                        $.ajax({
                                            url: "{{ route('activity.f8') }}",
                                            type: 'POST',
                                            data: {
                                                "idAct": $("#idAct").val(),
                                                "idList": 139,
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)

                                                if (val == null) {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 += '<input type="number" id="v1' +
                                                        139 +
                                                        '" class="form-control mb-3" value="">';
                                                } else {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 +=
                                                        '<input type="number"  id="v1' + 139 +
                                                        '" class="form-control mb-3" value="' + val
                                                        .v1 + '">';
                                                }
                                                $("#containerFunct" + 139).html(complement2);
                                            }
                                        });
                                        break;
                                    case 282:
                                        $.ajax({
                                            url: "{{ route('activity.f8') }}",
                                            type: 'POST',
                                            data: {
                                                "idAct": $("#idAct").val(),
                                                "idList": 282,
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)

                                                if (val == null) {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 += '<input type="number" id="v1' +
                                                        282 +
                                                        '" class="form-control mb-3" value="">';
                                                } else {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 +=
                                                        '<input type="number"  id="v1' + 282 +
                                                        '" class="form-control mb-3" value="' + val
                                                        .v1 + '">';
                                                }
                                                $("#containerFunct" + 282).html(complement2);
                                            }
                                        });
                                        break;
                                    case '39':
                                        $.ajax({
                                            url: "{{ route('activity.f2') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Batería para Módulo CHECKFIRE SC-N</label>';
                                                } else {
                                                    var a = moment(val.val);
                                                    var b = new Date();
                                                    var total = a.diff(b, 'days');
                                                    var v1;

                                                    var e = new Date()
                                                    var f = new Date()
                                                    var d;
                                                    var m;
                                                    var s;
                                                    e.setMonth(e.getMonth() - 6)
                                                    e = e.getFullYear() + "-" + (e.getMonth() + 1) +
                                                        "-" + e.getDate();
                                                    f.setDate(f.getDate() + 8)
                                                    if (f.getDate() < 10) {
                                                        d = '0' + f.getDate()
                                                    }
                                                    s = f.getMonth() + 1;
                                                    if (s < 10) {
                                                        m = '0' + s;
                                                    }
                                                    f = f.getFullYear() + "-" + m + "-" + d;
                                                    total = total + 365;
                                                    if (total < 0) {
                                                        v1 = 'is-invalid';
                                                    } else {
                                                        v1 = 'is-valid';
                                                    }
                                                    complement2 = '<label>' + val.label +
                                                    '</label>';
                                                    complement2 += '<input type="date" min="' + e +
                                                        '" max="' + f +
                                                        '"  id="ctl' + val.id +
                                                        '" class="form-control ' + v1 +
                                                        '" onchange="A1(' + val.id +
                                                        ')" value="' + val.val + '">';
                                                    complement2 +=
                                                        '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                    complement2 +=
                                                        '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                }
                                                $("#containerFunct1").html(complement2);
                                            }
                                        });

                                        break;
                                    case 369:
                                        $.ajax({
                                            url: "{{ route('activity.f8') }}",
                                            type: 'POST',
                                            data: {
                                                "idAct": $("#idAct").val(),
                                                "idList": 369,
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)

                                                if (val == null) {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 += '<input type="number" id="v1' +
                                                        369 +
                                                        '" class="form-control mb-3" value="">';
                                                } else {
                                                    complement2 =
                                                        '<label> Registre tiempo en segundos </label>';
                                                    complement2 +=
                                                        '<input type="number"  id="v1' + 369 +
                                                        '" class="form-control mb-3" value="' + val
                                                        .v1 + '">';
                                                }
                                                $("#containerFunct" + 369).html(complement2);
                                            }
                                        });
                                        break;
                                    case 143:
                                        $.ajax({
                                            url: "{{ route('activity.f7') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v9 = val[x].v9;
                                                        v10 = val[x].v10;
                                                        cont = x + 1;
                                                        var a = moment(v10);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;
                                                        var v2;
                                                        var v3;
                                                        var e = new Date()
                                                        var f = new Date()
                                                        var d;
                                                        var m;
                                                        var s;
                                                        e.setMonth(e.getMonth() - 6)
                                                        e = e.getFullYear() + "-" + (e.getMonth() +
                                                            1) + "-" + e.getDate();
                                                        f.setDate(f.getDate() + 8)
                                                        if (f.getDate() < 10) {
                                                            d = '0' + f.getDate()
                                                        }
                                                        s = f.getMonth() + 1;
                                                        if (s < 10) {
                                                            m = '0' + s;
                                                        }
                                                        f = f.getFullYear() + "-" + m + "-" + d;
                                                        total = total + 4380;
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                            v2 = 'text-danger'
                                                            v3 = '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                                id +
                                                                ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        } else {
                                                            v1 = 'is-valid';
                                                            v2 = 'text-custom';
                                                            v3 = '';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent ' +
                                                            v2 +
                                                            '" data-toggle="collapse" data-target="#collapse' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="collapse' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="collapse' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<label>Serial</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" disabled class="form-control mb-3 ' +
                                                            v1 + '" value="' +
                                                            v10 + '">';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 += v3;
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                    $("#containerFunct" + 143).html(complement2);
                                                }

                                            }
                                        });
                                        break;
                                    case 220:
                                        $.ajax({
                                            url: "{{ route('activity.f7') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v9 = val[x].v9;
                                                        v10 = val[x].v10;
                                                        cont = x + 1;
                                                        var a = moment(v10);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;
                                                        var v2;
                                                        var v3;
                                                        var e = new Date()
                                                        var f = new Date()
                                                        var d;
                                                        var m;
                                                        var s;
                                                        e.setMonth(e.getMonth() - 6)
                                                        e = e.getFullYear() + "-" + (e.getMonth() +
                                                            1) + "-" + e.getDate();
                                                        f.setDate(f.getDate() + 8)
                                                        if (f.getDate() < 10) {
                                                            d = '0' + f.getDate()
                                                        }
                                                        s = f.getMonth() + 1;
                                                        if (s < 10) {
                                                            m = '0' + s;
                                                        }
                                                        f = f.getFullYear() + "-" + m + "-" + d;
                                                        total = total + 4380;
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                            v2 = 'text-danger'
                                                            v3 = '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                                id +
                                                                ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        } else {
                                                            v1 = 'is-valid';
                                                            v2 = 'text-custom';
                                                            v3 = '';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent ' +
                                                            v2 +
                                                            '" data-toggle="collapse" data-target="#collapse' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="collapse' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="collapse' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<label>Serial</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" disabled class="form-control mb-3 ' +
                                                            v1 + '" value="' +
                                                            v10 + '">';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 += v3;
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                    $("#containerFunct" + 220).html(complement2);
                                                }

                                            }
                                        });
                                        break;
                                    case 251:
                                        $.ajax({
                                            url: "{{ route('activity.f7') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v9 = val[x].v9;
                                                        v10 = val[x].v10;
                                                        cont = x + 1;
                                                        var a = moment(v10);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;
                                                        var v2;
                                                        var v3;
                                                        var e = new Date()
                                                        var f = new Date()
                                                        var d;
                                                        var m;
                                                        var s;
                                                        e.setMonth(e.getMonth() - 6)
                                                        e = e.getFullYear() + "-" + (e.getMonth() +
                                                            1) + "-" + e.getDate();
                                                        f.setDate(f.getDate() + 8)
                                                        if (f.getDate() < 10) {
                                                            d = '0' + f.getDate()
                                                        }
                                                        s = f.getMonth() + 1;
                                                        if (s < 10) {
                                                            m = '0' + s;
                                                        }
                                                        f = f.getFullYear() + "-" + m + "-" + d;
                                                        total = total + 4380;
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                            v2 = 'text-danger'
                                                            v3 = '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                                id +
                                                                ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        } else {
                                                            v1 = 'is-valid';
                                                            v2 = 'text-custom';
                                                            v3 = '';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent ' +
                                                            v2 +
                                                            '" data-toggle="collapse" data-target="#collapse' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="collapse' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="collapse' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<label>Serial</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" disabled class="form-control mb-3 ' +
                                                            v1 + '" value="' +
                                                            v10 + '">';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 += v3;
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                    $("#containerFunct" + 251).html(complement2);
                                                }

                                            }
                                        });
                                        break;
                                    case 374:
                                        $.ajax({
                                            url: "{{ route('activity.f7') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val == null) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con Cable Térmico</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v9 = val[x].v9;
                                                        v10 = val[x].v10;
                                                        cont = x + 1;
                                                        var a = moment(v10);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;
                                                        var v2;
                                                        var v3;
                                                        var e = new Date()
                                                        var f = new Date()
                                                        var d;
                                                        var m;
                                                        var s;
                                                        e.setMonth(e.getMonth() - 6)
                                                        e = e.getFullYear() + "-" + (e.getMonth() +
                                                            1) + "-" + e.getDate();
                                                        f.setDate(f.getDate() + 8)
                                                        if (f.getDate() < 10) {
                                                            d = '0' + f.getDate()
                                                        }
                                                        s = f.getMonth() + 1;
                                                        if (s < 10) {
                                                            m = '0' + s;
                                                        }
                                                        f = f.getFullYear() + "-" + m + "-" + d;
                                                        total = total + 4380;
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                            v2 = 'text-danger'
                                                            v3 = '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                                id +
                                                                ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        } else {
                                                            v1 = 'is-valid';
                                                            v2 = 'text-custom';
                                                            v3 = '';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent ' +
                                                            v2 +
                                                            '" data-toggle="collapse" data-target="#collapse' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="collapse' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="collapse' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<label>Serial</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" disabled class="form-control mb-3 ' +
                                                            v1 + '" value="' +
                                                            v10 + '">';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 += v3;
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                    $("#containerFunct" + 374).html(complement2);
                                                }

                                            }
                                        });
                                        break;
                                    case 148:
                                        $.ajax({
                                            url: "{{ route('activity.f13') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con tanques QS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<div id="alertcontainer' +
                                                            ControlFillId + '"></div>';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3"  value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Altura QS</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="' +
                                                            ControlFillId + '" onchange="A4(' +
                                                            ControlFillId + ')" placeholder="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';

                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 148).html(complement2);
                                            }
                                        });
                                        break;
                                    case 248:
                                        $.ajax({
                                            url: "{{ route('activity.f13') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con tanques QS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<div id="alertcontainer' +
                                                            ControlFillId + '"></div>';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3"  value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Altura QS</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="' +
                                                            ControlFillId + '" onchange="A4(' +
                                                            ControlFillId + ')" placeholder="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';

                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 248).html(complement2);
                                            }
                                        });
                                        break;
                                    case 256:
                                        $.ajax({
                                            url: "{{ route('activity.f13') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con tanques QS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<div id="alertcontainer' +
                                                            ControlFillId + '"></div>';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3"  value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Altura QS</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="' +
                                                            ControlFillId + '" onchange="A4(' +
                                                            ControlFillId + ')" placeholder="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';

                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 256).html(complement2);
                                            }
                                        });
                                        break;
                                    case 379:
                                        $.ajax({
                                            url: "{{ route('activity.f13') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100">El equipo no cuenta con tanques QS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<div id="alertcontainer' +
                                                            ControlFillId + '"></div>';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3"  value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Altura QS</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="' +
                                                            ControlFillId + '" onchange="A4(' +
                                                            ControlFillId + ')" placeholder="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';

                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 379).html(complement2);
                                            }
                                        });
                                        break;
                                    case 150:
                                        $.ajax({
                                            url: "{{ route('activity.f15') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<div id="alertcontainer' +
                                                            ControlFillId + '"></div>';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Altura QS</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="' +
                                                            ControlFillId + '" onchange="A4(' +
                                                            ControlFillId + ')" placeholder="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 150).html(complement2);
                                            }
                                        });
                                        break;
                                    case 258:
                                        $.ajax({
                                            url: "{{ route('activity.f15') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<div id="alertcontainer' +
                                                            ControlFillId + '"></div>';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Altura QS</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="' +
                                                            ControlFillId + '" onchange="A4(' +
                                                            ControlFillId + ')" placeholder="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 258).html(complement2);
                                            }
                                        });
                                        break;
                                    case 381:
                                        $.ajax({
                                            url: "{{ route('activity.f15') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 += '<div id="alertcontainer' +
                                                            ControlFillId + '"></div>';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '">';
                                                        complement2 += '<label>Altura QS</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="' +
                                                            ControlFillId + '" onchange="A4(' +
                                                            ControlFillId + ')" placeholder="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 381).html(complement2);
                                            }
                                        });
                                        break;
                                    case 191:
                                        $.ajax({
                                            url: "{{ route('activity.f16') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 191).html(complement2);
                                            }
                                        });
                                        break;
                                    case 222:
                                        $.ajax({
                                            url: "{{ route('activity.f16') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 222).html(complement2);
                                            }
                                        });
                                        break;
                                    case 314:
                                        $.ajax({
                                            url: "{{ route('activity.f16') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 314).html(complement2);
                                            }
                                        });
                                        break;
                                    case 438:
                                        $.ajax({
                                            url: "{{ route('activity.f16') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 438).html(complement2);
                                            }
                                        });
                                        break;
                                    case 192:
                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 192).html(complement2);
                                            }
                                        });
                                        break;
                                    case 223:
                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 223).html(complement2);
                                            }
                                        });
                                        break;
                                    case 315:
                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 315).html(complement2);
                                            }
                                        });
                                        break;
                                    case 439:
                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 439).html(complement2);
                                            }
                                        });
                                        break;
                                    case 193:
                                        $.ajax({
                                            url: "{{ route('activity.f19') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll2' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll2' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll2' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 193).html(complement2);
                                            }
                                        });
                                        break;
                                    case 316:
                                        $.ajax({
                                            url: "{{ route('activity.f19') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll2' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll2' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll2' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 316).html(complement2);
                                            }
                                        });
                                        break;
                                    case 440:
                                        $.ajax({
                                            url: "{{ route('activity.f19') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll2' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll2' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll2' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 440).html(complement2);
                                            }
                                        });
                                        break;
                                    case 194:
                                        $.ajax({
                                            url: "{{ route('activity.f20') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll3' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll3' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll3' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Presion</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 194).html(complement2);
                                            }
                                        });
                                        break;
                                    case 224:
                                        $.ajax({
                                            url: "{{ route('activity.f20') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll3' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll3' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll3' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Presion</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 224).html(complement2);
                                            }
                                        });
                                        break;
                                    case 317:
                                        $.ajax({
                                            url: "{{ route('activity.f20') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll3' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll3' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll3' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Presion</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 317).html(complement2);
                                            }
                                        });
                                        break;
                                    case 441:
                                        $.ajax({
                                            url: "{{ route('activity.f20') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll3' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll3' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll3' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Presion</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 441).html(complement2);
                                            }
                                        });
                                        break;

                                    case 195:
                                        $.ajax({
                                            url: "{{ route('activity.f22') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="colla1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="colla1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 195).html(complement2);
                                            }
                                        });
                                        break;
                                    case 225:
                                        $.ajax({
                                            url: "{{ route('activity.f22') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="colla1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="colla1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 225).html(complement2);
                                            }
                                        });
                                        break;
                                    case 319:
                                        $.ajax({
                                            url: "{{ route('activity.f22') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="colla1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="colla1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 319).html(complement2);
                                            }
                                        });
                                        break;
                                    case 443:
                                        $.ajax({
                                            url: "{{ route('activity.f22') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="colla1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="colla1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="' +
                                                            ControlFillId + '"  value="' + v14 +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 443).html(complement2);
                                            }
                                        });
                                        break;
                                    case 196:

                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 196).html(complement2);
                                            }
                                        });
                                        break;
                                    case 226:

                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 226).html(complement2);
                                            }
                                        });
                                        break;
                                    case 320:

                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 320).html(complement2);
                                            }
                                        });
                                        break;
                                    case 444:

                                        $.ajax({
                                            url: "{{ route('activity.f17') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        v9 = val[x].v9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        var a = moment(v14);
                                                        var b = new Date()
                                                        var total = a.diff(b, 'days');
                                                        var v1;

                                                        if (itemId == 2) {
                                                            total = total + 4380;
                                                        } else {
                                                            total = total + 3560;
                                                        }
                                                        if (total < 0) {
                                                            v1 = 'is-invalid';
                                                        } else {
                                                            v1 = 'is-valid';
                                                        }
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled  value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Fecha PH</label>';
                                                        complement2 +=
                                                            '<input type="date" class="form-control mb-3 ' +
                                                            v1 + '" id="ctl' + ControlFillId +
                                                            '" onchange="A5(' + ControlFillId +
                                                            ')"  value="' + v14 + '" >';
                                                        complement2 +=
                                                            '<div class="invalid-feedback mb-3">Fecha de instalación vencida</div>';
                                                        complement2 +=
                                                            '<div class="valid-feedback mb-3">Fecha de instalación vigente</div>';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 444).html(complement2);
                                            }
                                        });
                                        break;
                                    case 197:
                                        $.ajax({
                                            url: "{{ route('activity.f24') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll2' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll2' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll2' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 197).html(complement2);
                                            }
                                        });
                                        break;
                                    case 321:
                                        $.ajax({
                                            url: "{{ route('activity.f24') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll2' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll2' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll2' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 321).html(complement2);
                                            }
                                        });
                                        break;
                                    case 445:
                                        $.ajax({
                                            url: "{{ route('activity.f24') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll2' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll2' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll2' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 445).html(complement2);
                                            }
                                        });
                                        break;
                                    case 198:
                                        $.ajax({
                                            url: "{{ route('activity.f25') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con capsulas de actuacion</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="colla1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="colla1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 198).html(complement2);
                                            }
                                        });
                                        break;
                                    case 324:
                                        $.ajax({
                                            url: "{{ route('activity.f25') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="colla1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="colla1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 324).html(complement2);
                                            }
                                        });
                                        break;
                                    case 447:
                                        $.ajax({
                                            url: "{{ route('activity.f25') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v14 = val[x].v14;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#colla1' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="colla1' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="colla1' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Seria/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" value="' +
                                                            v14 + '">';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 447).html(complement2);
                                            }
                                        });
                                        break;
                                    case 199:
                                        $.ajax({
                                            url: "{{ route('activity.f26') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con capsulas de actuacion</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll3' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll3' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll3' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 199).html(complement2);
                                            }
                                        });
                                        break;
                                    case 325:
                                        $.ajax({
                                            url: "{{ route('activity.f26') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll3' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll3' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll3' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 325).html(complement2);
                                            }
                                        });
                                        break;
                                    case 448:
                                        $.ajax({
                                            url: "{{ route('activity.f26') }}",
                                            type: 'POST',
                                            data: {
                                                "idEquip": $("#equip_id").val(),
                                                "_token": "{{ csrf_token() }}",
                                            },
                                            success: function(res) {
                                                var val = JSON.parse(res)
                                                if (val.length == 0) {
                                                    complement2 =
                                                        '<label class="bg-gray text-dark p-3 rounded texto text-sm text-center w-100" style="text-transform:none;">El equipo no cuenta con tanques LVS</label>';
                                                } else {
                                                    complement2 =
                                                        '<div id="accordion2" class="w-100 mb-3">';
                                                    for (let x = 0; x < val.length; x++) {
                                                        id = val[x].compo_id;
                                                        name = val[x].name;
                                                        v15 = val[x].V15;
                                                        v16 = val[x].V16;
                                                        v9 = val[x].V9;
                                                        ControlFillId = val[x].ControlFillId;
                                                        itemId = val[x].itId;
                                                        compo_id = val[x].compo_id;
                                                        cont = x + 1;
                                                        complement2 +=
                                                            '<div class="card mb-0 rounded-0">';
                                                        complement2 +=
                                                            '<div class="card-header" id="heading' +
                                                            id + '">';
                                                        complement2 +=
                                                            '<button class="w-100 text-left px-2 py-1 border-0 bg-transparent text-custom" data-toggle="collapse" data-target="#coll3' +
                                                            id +
                                                            '" aria-expanded="true" aria-controls="coll3' +
                                                            id + '">';
                                                        complement2 += name + ' <' + cont + '>';
                                                        complement2 +=
                                                            '<i class="fas fa-chevron-down float-right text-info"></i>';
                                                        complement2 += '</button>';
                                                        complement2 += '</div>';
                                                        complement2 += '<div id="coll3' + id +
                                                            '" class="collapse" aria-labelledby="heading' +
                                                            id + '" data-parent="#accordion2">';
                                                        complement2 += '<div class="card-body">';
                                                        complement2 +=
                                                            '<label>Serial/Consecutivo</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" disabled value="' +
                                                            v9 + '" >';
                                                        complement2 += '<label>Peso</label>';
                                                        complement2 +=
                                                            '<input type="text" class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" onchange="A5(' +
                                                            ControlFillId + ')"  value="' + v15 +
                                                            '" >';
                                                        complement2 +=
                                                            '<label>Peso Estampado</label>';
                                                        complement2 +=
                                                            '<input type="text" disabled class="form-control mb-3" id="ctl' +
                                                            ControlFillId + '" value="' + v16 +
                                                            '" >';
                                                        complement2 +=
                                                            '<input type="hidden" class="form-control mb-3" id="item' +
                                                            ControlFillId + '" value="' + itemId +
                                                            '">';
                                                        complement2 +=
                                                            '<input type="hidden" id="item_id' +
                                                            compo_id + '" value="' + itemId + '">';
                                                        complement2 +=
                                                            '<a class="btn btn-success btn-sm text-white mb-3" onclick="modalchangecompo(' +
                                                            compo_id +
                                                            ')"><i class="fas fa-sync-alt"></i> Cambiar</a>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                        complement2 += '</div>';
                                                    }
                                                    complement2 += '</div>';
                                                }
                                                $("#containerFunct" + 448).html(complement2);
                                            }
                                        });
                                        break;
                                    default:
                                        break;
                                }
                            }
                            if (state == 1) {
                                state = 'checked';
                                na = '';
                            } else if (state == 3) {
                                na = 'checked';
                                state = '';
                            } else {
                                state = '';
                                na = '';
                            }

                            if (observation) {} else {
                                observation = '';
                            }
                            todo += '<div class="tab-pane fade ' + complement + '" id="pills' + id +
                                '" role="tabpanel" aria-labelledby="pills' + id + '">';
                            todo += '<h5 class="text-dark text-md">' + name + '</h5>'
                            todo += '<div class="mb-5 mt-2">';
                            todo +=
                                '<div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">';
                            todo += '<input type="checkbox" id="statemodal' + id + '" ' + state + '>';
                            todo += '<label for="statemodal' + id + '"></label>';
                            todo += '</div>';
                            todo +=
                                '<label class="float-right mr-4 text-dark texto">Tarea realizada</label>';
                            todo += '</div>';
                            todo +=
                                '<p id="descriptionmodal' + id +
                                '" class="text-dark font-weight-semibold texto" style="text-transform:none;">';
                            todo += description;
                            todo += '</p>';
                            todo += container1;
                            todo += '<div class="form-group">';
                            todo += '<label for="observationmodal' + id + '">Observaciones</label>';
                            todo += '<textarea id="observationmodal' + id + '" class="form-control">' +
                                observation + '</textarea>';
                            todo += '<div class="mt-3">'
                            todo +=
                                '<div class="toggle-checkbox toggle-danger checkbox-inline toggle-sm float-left">'
                            todo += '<input type="checkbox" name="noaplica' + id + '" id="noaplica' + id +
                                '" ' + na + '>'
                            todo += '<label for="noaplica' + id + '"></label>'
                            todo += '</div>'
                            todo += '<label for="noaplica' + id +
                                '" class="mr-4 text-dark texto float-left">No aplica</label>'
                            todo += '</div>'
                            todo += '<input type="hidden" id="idAnswer' + id + '" value="' + idanswer + '">';
                            todo += '</div>';
                            todo += '</div>';
                        }
                        todo += '</div><input type="hidden" id="arrdata" value="' + arr + '">';
                        $('#content2').html(todo);
                        $('#content2').append('<input type="hidden" id="idlistmodal' + id + '" value="">');
                        $('#content2').append('<input type="hidden" id="idAnswer' + id + '" value="">');

                    }
                });
            }
            //simple task
            else {
                $("#content1").removeClass("d-none");
                $("#content2").addClass("d-none");
                $('#customModal').modal('show');
                document.getElementById('idlistmodal').value = id;
                document.getElementById('idAnswer').value = answId;
                $('#titlemodal').text(title);
                $('#descriptionmodal').text(description);
                if (state == 3) {
                    $('#noaplica').prop('checked', true);
                } else {
                    $('#noaplica').prop('checked', false);
                    state == 1 ? $('#statemodal').prop('checked', true) : $('#statemodal').prop('checked', false);
                }
                observation ? $('#observationmodal').text(observation) : $('#observationmodal').text('');
            }
        }
        // final save

        function saveFinal() {
            var equip_id = $("#equip_id").val();
            var idAct = $("#idAct").val();
            var endDate = $("#endDate").val();
            var endTime = $("#endTime").val();
            $.ajax({
                url: "{{ route('activity.storeInitial') }}",
                type: 'POST',
                data: {
                    "idAct": idAct,
                    "endDate": endDate,
                    "endTime": endTime,
                    "equip_id": equip_id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    $("#generalmodalfinish").modal('hide'); //ocultamos el modal
                    $('body').removeClass(
                        'modal-open'); //eliminamos la clase del body para poder hacer scroll
                    $('.modal-backdrop').remove();
                    location.reload();

                }
            });

        }

        //update general info
        function saveInitial() {
            //variables
            startDate = $("#startDate").val(),
                startTime = $("#startTime").val(),
                horometer = $("#horometer").val(),
                location_id = $("#location_id").val(),
                type_id = $("#type_id").val(),
                equip_id = $("#equip_id").val(),
                idAct = $("#idAct").val(),
                $.ajax({
                    url: "{{ route('activity.storeInitial') }}",
                    type: 'POST',
                    data: {
                        // "state": state,
                        "idAct": idAct,
                        "startDate": startDate,
                        "startTime": startTime,
                        "horometer": horometer,
                        "location_id": location_id,
                        "type_id": type_id,
                        "equip_id": equip_id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        console.log(val)
                        $("#generalmodal").modal('hide'); //ocultamos el modal
                        $('body').removeClass(
                            'modal-open'); //eliminamos la clase del body para poder hacer scroll
                        $('.modal-backdrop').remove();
                        location.reload();


                    }
                });
        }
        //functions
        function A1(id) {
            $.ajax({
                url: "{{ route('activity.f3') }}",
                type: 'POST',
                data: {
                    "id": id,
                    "val": $('#ctl' + id).val(),
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)

                    if (val) {
                        var div =
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        div += '<h4 class="alert-heading">Registro actualizado...</h4>';
                        div +=
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        div += '<span aria-hidden="true">&times;</span>';
                        div += '</button>';
                        div += '</div>';
                        $('#alertcontainer').html(div);
                        $('#alertcontainer2').html(div);
                        $('.invalid-feedback').addClass('d-none');
                        $('.valid-feedback').addClass('d-none');
                        setTimeout(refrescar, 60000);

                    }


                }
            });
        }

        function A2(id) {
            $.ajax({
                url: "{{ route('activity.f9') }}",
                type: 'POST',
                data: {
                    "idActiv": id,
                    "val": $("#" + id).val(),
                    "idList": 138,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    if (val) {
                        var div =
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        div += '<h4 class="alert-heading">Registro actualizado...</h4>';
                        div +=
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        div += '<span aria-hidden="true">&times;</span>';
                        div += '</button>';
                        div += '</div>';
                        $('#alertcontainer').html(div);
                        $('#alertcontainer2').html(div);
                        $('.invalid-feedback').addClass('d-none');
                        $('.valid-feedback').addClass('d-none');
                        setTimeout(refrescar, 60000);

                    }


                }
            });
        }

        function A3(id) {
            $.ajax({
                url: "{{ route('activity.f9') }}",
                type: 'POST',
                data: {
                    "idActiv": id,
                    "val": $("#" + id).val(),
                    "idList": 139,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    if (val) {
                        var div =
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        div += '<h4 class="alert-heading">Registro actualizado...</h4>';
                        div +=
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        div += '<span aria-hidden="true">&times;</span>';
                        div += '</button>';
                        div += '</div>';
                        $('#alertcontainer').html(div);
                        $('#alertcontainer2').html(div);
                        $('.invalid-feedback').addClass('d-none');
                        $('.valid-feedback').addClass('d-none');
                        setTimeout(refrescar, 60000);

                    }


                }
            });
        }
        //refresh function
        function A4(val) {
            var controlFillId = val;
            var item_id = $("#item" + controlFillId).val();
            var valu = $("#" + controlFillId).val();
            var cont = 0;
            var msg;
            switch (parseInt(item_id)) {
                case 1:
                    if (valu > 19) {
                        cont++;
                        msg = 'LT-A-101-30: 7-1/2” =19 cms';
                    } else {}
                    break;
                case 8:
                    if (valu > 24) {
                        cont++;
                        msg = 'LT-A-101-125: 9-1/2” = 24,13 cms';
                    } else {}
                    break;
                case 9:
                    if (valu > 48) {
                        cont++;
                        msg = 'LT-A-101-250: 19” = 48,26 cms';
                    } else {}
                    break;
                case 10:
                    if (valu > 9) {
                        cont++;
                        msg = 'LVS 10: 3,5” = 8,89 cms';
                    } else {}
                    break;
                case 11:
                    if (valu > 11) {
                        cont++;
                        msg = 'LVS 15: 4” = 10,16 cms';
                    } else {}
                    break;
                case 12:
                    if (valu > 31) {
                        cont++;
                        msg = 'LVS 30: 12” = 30,48 cms';
                    } else {}
                    break;
                case 20:
                    if (valu > 13) {
                        cont++;
                        msg = 'LVS 5: 5” = 12,7 cms';
                    } else {}
                    break;

                default:
                    break;
            }
            if (cont == 0) {
                $.ajax({
                    url: "{{ route('activity.f14') }}",
                    type: 'POST',
                    data: {
                        "idControlFill": controlFillId,
                        "data": valu,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        if (val) {
                            var div =
                                '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                            div += '<h4 class="alert-heading">Registro actualizado...</h4>';
                            div +=
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            div += '<span aria-hidden="true">&times;</span>';
                            div += '</button>';
                            div += '</div>';
                            $('#alertcontainer' + controlFillId).html(div);
                            setTimeout(refrescar, 60000);
                        }
                    }
                });
            } else {
                var div = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                div += '<h4 class="alert-heading" style="text-transform:none;">Altura maxima: ' + msg + '</h4>';
                div += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                div += '<span aria-hidden="true">&times;</span>';
                div += '</button>';
                div += '</div>';
                $('#alertcontainer' + controlFillId).html(div);
            }



            // var div ='<div class="alert alert-success alert-dismissible fade show" role="alert">';
            // div += '<h4 class="alert-heading">Registro actualizado...</h4>';
            // div += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            // div += '<span aria-hidden="true">&times;</span>';
            // div += '</button>';
            // div += '</div>';
        }

        function A5(id) {
            var itemId = $("#item" + id).val();
            var cont = 0;
            var msg;
            if (itemId) {
                switch (itemId) {
                    case 15:
                        if (itemId > 10 && itemId < 16) {} else {
                            msg = 'Debe estar dentro del rango PESO ESTAMPADO ± 14 gramos'
                            cont++;
                        }
                        break;
                    case 21:
                        if (itemId > 1800 && itemId < 2300) {} else {
                            msg = 'Debe estar dentro del rango PESO ESTAMPADO ± 14 gramos'
                            cont++;
                        }
                        case 22:
                            if (itemId > 1800 && itemId < 2300) {} else {
                                msg = 'Debe estar dentro del rango PESO ESTAMPADO ± 14 gramos'
                                cont++;
                            }
                            break;
                        default:
                            break;
                }
            }
            if (cont == 0) {
                $.ajax({
                    url: "{{ route('activity.f18') }}",
                    type: 'POST',
                    data: {
                        "id": id,
                        "val": $('#ctl' + id).val(),
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        if (val) {
                            var div =
                                '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                            div += '<h4 class="alert-heading">Registro actualizado</h4>';
                            div +=
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                            div += '<span aria-hidden="true">&times;</span>';
                            div += '</button>';
                            div += '</div>';
                            $('#alertcontainer').html(div);
                            $('#alertcontainer2').html(div);
                            $('.invalid-feedback').addClass('d-none');
                            $('.valid-feedback').addClass('d-none');
                            setTimeout(refrescar, 60000);

                        }


                    }
                });
            } else {
                var div = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                div += '<h4 class="alert-heading" style="text-transform:none;">Altura maxima: ' + msg + '</h4>';
                div += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                div += '<span aria-hidden="true">&times;</span>';
                div += '</button>';
                div += '</div>';
                $('#alertcontainer' + id).html(div);
            }

        }


        function refrescar() {
            location.reload();
        }
    </script>
@endsection
